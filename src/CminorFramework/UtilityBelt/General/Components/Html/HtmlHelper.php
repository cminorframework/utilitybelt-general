<?php
namespace CminorFramework\UtilityBelt\General\Components\Html;

use CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement;
use CminorFramework\UtilityBelt\General\Helpers\Html\Elements\SelectboxHtmlElement;
use CminorFramework\UtilityBelt\General\Contracts\Html\Elements\IHtmlElement;
use CminorFramework\UtilityBelt\General\Contracts\Html\Elements\ISelectboxHtmlElement;
use CminorFramework\UtilityBelt\General\Contracts\Html\IHtmlHelper;

/**
 * Factory Pattern plus Helper functions
 *
 * Build html element objects
 *
 * @package CminorFramework\UtilityBelt\General\Helpers
 * @subpackage Html
 *
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
class HtmlHelper implements IHtmlHelper
{

    /**
     * Holds the html element definition, that will be used to create new html element objects
     * @var \CminorFramework\UtilityBelt\General\Contracts\Html\Elements\IHtmlElement
     */
    protected $html_element_definition;

    /**
     * Holds the selectbox element definition, that will be used to create new selectbox element objects
     * @var \CminorFramework\UtilityBelt\General\Contracts\Html\Elements\ISelectboxHtmlElement
     */
    protected $selectbox_element_definition;

    public function __construct(IHtmlElement $html_element_definition, ISelectboxHtmlElement $selectbox_element_definition)
    {
        $this->html_element_definition = $html_element_definition;
        $this->selectbox_element_definition = $selectbox_element_definition;
    }

    /**
     * Creates a new html element object
     * If element_type is provided, then an html element object of this type will be created
     * @param string $element_type
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\Elements\IHtmlElement
     */
    public function createHtmlElement($element_type = null)
    {
        $html_element = clone $this->html_element_definition;
        return $html_element;

    }

    /**
     * Creates a new selectbox html element
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\Elements\ISelectboxHtmlElement
     */
    public function createSelectboxElement()
    {
        $selectbox_element = clone $this->selectbox_element_definition;
        return $selectbox_element;
    }

    /**
     * Wraps text inside an html element with css class
     * @param string $item
     * @param string $html_element
     * @param string $css_class
     * @return string
     */
    public function wrapItemInHtmlElement($item, $html_element, $css_class = null)
    {

        if($css_class){
            $string = '<%s class="%s">%s</%s>';
            return sprintf($string, $html_element, $css_class, $item, $html_element);
        }
        else{

            $string = '<%s>%s</%s>';
            return sprintf($string, $html_element, $item, $html_element);

        }

    }


}