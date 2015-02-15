<?php
namespace CminorFramework\UtilityBelt\General\Contracts\Html\Elements;

/**
 * Base interface that defines an html element object
 *
 */
interface IHtmlElement
{

    /**
     * Builds the object into an html element string
     *
     * @return string
     */
    public function toHtml();


    /**
     * Sets extra attributes to the html element
     *
     * @param array $tags
     * @return \CminorFramework\UtilityBelt\General\Components\Html\Elements\HtmlElement
     */
    public function setExtraTags( array $tags );

    /**
     * Sets a property of the html element object
     *
     * @param string $property
     * @param unknown $value
     * @throws \RuntimeException
     * @return \CminorFramework\UtilityBelt\General\Components\Html\Elements\HtmlElement
     */
    public function set( $property, $value );

    /**
     * Returns a property of the html element object
     *
     * @param string $property
     * @throws \RuntimeException
     */
    public function get( $property );


    /**
     * Sets the name attribute of the html element
     *
     * @param string $name
     * @return \CminorFramework\UtilityBelt\General\Components\Html\Elements\HtmlElement
     */
    public function setName( $name );

    /**
     * Sets the id attribute of the html element
     *
     * @param int $id
     * @return \CminorFramework\UtilityBelt\General\Components\Html\Elements\HtmlElement
     */
    public function setId( $id );

    /**
     * Sets the inner html attribute of the html element
     *
     * @param string $innerHtml
     * @return \CminorFramework\UtilityBelt\General\Components\Html\Elements\HtmlElement
     */
    public function setInnerHtml( $innerHtml );

    /**
     * Sets the class attribute of the html element
     *
     * @param string $class
     * @return \CminorFramework\UtilityBelt\General\Components\Html\Elements\HtmlElement
     */
    public function setClass( $class );

    /**
     * Sets the Element Type of the html element (a, input, etc)
     *
     * @param string $element_type
     * @return \CminorFramework\UtilityBelt\General\Components\Html\Elements\HtmlElement
     */
    public function setElementType( $element_type );

    /**
     * Sets the title attribute of the html element
     *
     * @param string $title
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function setTitle( $title );

    /**
     * Sets the data-toggle, data-original-title attribute of the html element
     *
     * @param string $tool_tip
     * @return \CminorFramework\UtilityBelt\General\Components\Html\Elements\HtmlElement
     */
    public function setBootstrapTooltip( $tool_tip );

    /**
     * Sets the css class for bootstrap tooltips
     *
     * @param string $tooltip_class
     * @return \CminorFramework\UtilityBelt\General\Components\Html\Elements\HtmlElement
     */
    public function setBootstrapTooltipClass( $tooltip_class );

    /**
     * Sets the type attribute of the html element
     *
     * @param string $type
     * @return \CminorFramework\UtilityBelt\General\Components\Html\Elements\HtmlElement
     */
    public function setType( $type );

    /**
     * Sets the value attribute of the html element
     *
     * @param unknown $value
     * @return \CminorFramework\UtilityBelt\General\Components\Html\Elements\HtmlElement
     */
    public function setValue( $value );

}