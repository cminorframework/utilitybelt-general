<?php
namespace CminorFramework\UtilityBelt\General\Contracts\Html;
/**
 * Public methods should return $this, to enable method chaining
 *
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
interface IHtmlWrapper
{
/**
     * Wraps the provided data items in html element
     * @return string|array
     */
    public function wrap();

    /**
     * The data to be wrapped
     * @param string|array $data
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\IHtmlWrapper
     */
    public function withData($data);

    /**
     * The html element to wrap the data items
     * @param unknown $html_element
     * @param string $element_closing
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\IHtmlWrapper
     */
    public function inElement($html_element, $element_closing = null);

    /**
     * The attributes of the html element that will wrap the items
     * @param array $html_element_attributes
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\IHtmlWrapper
     */
    public function withAttributes(array $html_element_attributes);

    /**
     * The value that will be wrapped. If the data items are objects and you want a to wrap the result of a method or a property,
     * wrap the method call with {{ }}
     * example: $this->withValueToWrap('{{getName()}}') or $this->withValueToWrap('{{name}}')
     * @param string $value
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\IHtmlWrapper
     */
    public function withValueToWrap($value = null);

}