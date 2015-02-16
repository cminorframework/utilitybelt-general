<?php
namespace CminorFramework\UtilityBelt\General\Components\Html;

class HtmlWrapper
{

    protected $data;
    protected $data_properties;
    protected $html_element;
    protected $html_element_closing;
    protected $html_element_attributes;
    protected $value_to_wrap;

    /**
     * Wraps the provided data items in html element
     * @return string|array
     */
    public function wrap()
    {
        $this->__validateItemSet($this->html_element, 'html element');
        $this->__validateItemSet($this->data, 'data');

        return $this->_performWrap($this->data);

    }

    /**
     * The data to be wrapped
     * @param string|array $data
     * @return \CminorFramework\UtilityBelt\General\Components\Html\HtmlWrapper
     */
    public function withData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * The html element to wrap the data items
     * @param unknown $html_element
     * @param string $element_closing
     * @return \CminorFramework\UtilityBelt\General\Components\Html\HtmlWrapper
     */
    public function inElement($html_element, $element_closing = null)
    {
        $this->html_element = $html_element;
        $this->html_element_closing = $element_closing;
        return $this;
    }

    /**
     * The attributes of the html element that will wrap the items
     * @param array $html_element_attributes
     * @return \CminorFramework\UtilityBelt\General\Components\Html\HtmlWrapper
     */
    public function withAttributes(array $html_element_attributes)
    {
        $this->html_element_attributes = $html_element_attributes;
        return $this;
    }

    /**
     * The value that will be wrapped. If the data items are objects and you want a to wrap the result of a method or a property,
     * wrap the method call with {{ }}
     * example: $this->withValueToWrap('{{getName()}}') or $this->withValueToWrap('{{name}}')
     * @param string $value
     * @return \CminorFramework\UtilityBelt\General\Components\Html\HtmlWrapper
     */
    public function withValueToWrap($value = null)
    {
        $this->value_to_wrap = $value;
        return $this;
    }

    protected function _performWrap($data = null)
    {

        $html_elements = [];
        if(is_array($data)){
            foreach($data as $data_item){

                $html_elements[] = $this->_performWrap($data_item);
            }
        }
        else{
            $html_elements = $this->_parseElementOpening().' '.$this->_parseHtmlAttributes($data).'>'.$this->_parseValueToWrap($data).$this->_parseElementClosing();
        }

        return $html_elements;
    }

    protected function _parseHtmlAttributes($data_item)
    {
        $html_attributes = [];
        if($this->html_element_attributes){
            foreach($this->html_element_attributes as $attribute => $value){

                $html_attributes[] = $attribute.'="'.$this->_evaluateAttributeValue($value, $data_item).'"';
            }
            $html_attributes = implode(" ", $html_attributes);
        }
        return $html_attributes;
    }

    protected function _parseValueToWrap($data_item)
    {
        if($this->value_to_wrap){
            return $this->_evaluateAttributeValue($this->value_to_wrap, $data_item);
        }
        return $data_item;
    }

    protected function _evaluateAttributeValue($value, $data_item)
    {

        //if the value is a reference to an object property or method
        if(strpos($value, '{{') !== false ){
            $reference = str_replace(['{{', '}}', ' '], '', $value);

            //its a method
            if(strpos($reference, '(') !== false){
                //remove any parenthesis and check for method
                if(!method_exists($data_item, strstr($reference, '(', true))){
                    throw new \RuntimeException(__CLASS__.'->'.__FUNCTION__.'(): '.$reference.' method not exists!');
                }
            }
            //its a property
            else{
                //remove any parenthesis and check for method
                if(!property_exists($data_item, $reference)){
                    throw new \RuntimeException(__CLASS__.'->'.__FUNCTION__.'(): '.$reference.' property not exists!');
                }
            }
            return $data_item->$reference;
        }

        return $value;

    }

    protected function _parseElementOpening()
    {
        return '<'.$this->html_element;
    }

    protected function _parseElementClosing()
    {
        if(!$this->html_element_closing){
            return '</'.$this->html_element.'>';
        }
        return $this->html_element_closing;
    }

    protected function __validateItemSet($item, $item_type = 'item')
    {
        if(!$item){
            throw new \InvalidArgumentException(__CLASS__.'->'.__FUNCTION__.'(): '.$item_type.' not set!');
        }
    }


}