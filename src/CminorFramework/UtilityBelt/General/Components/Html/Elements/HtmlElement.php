<?php
namespace CminorFramework\UtilityBelt\General\Components\Html\Elements;

use CminorFramework\UtilityBelt\General\Contracts\Html\Elements\IHtmlElement;
/**
 * Base class that creates an html element object
 * Can be extended to create specific html element objects
 *
 * @package CminorFramework\UtilityBelt\General\Helpers
 * @subpackage Html\Elements
 * @version 0.1
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
class HtmlElement implements IHtmlElement
{

    /**
     * The type of the html element (a, input, div, etc)
     *
     * @var string
     */
    protected $element;

    /**
     * The css class attribute
     *
     * @var string
     */
    protected $class;

    /**
     * The innerhtml text
     *
     * @var string
     */
    protected $innerhtml;

    /**
     * Array containing extra html attributes as attribute=>value
     *
     * @var array
     */
    protected $extra_tags = array();

    /**
     * The name attribute
     *
     * @var string
     */
    protected $name;

    /**
     * The id attribute
     *
     * @var string
     */
    protected $id;

    /**
     * The title attribute
     *
     * @var string
     */
    protected $title;

    /**
     * The tooltip class (if using bootstrap tooltips)
     *
     * @var string
     */
    protected $tooltip_class;

    /**
     * The type attribute
     *
     * @var string
     */
    protected $type;

    /**
     * Holds the elements that have no end tag
     *
     * @var array
     */
    protected $_no_endtag_types = array( 'input', 'button' );

    /**
     * The value attribute
     *
     * @var string
     */
    protected $value;

    /**
     * Builds the object into an html element string
     *
     * @return string
     */
    public function toHtml()
    {

        return '<' . $this->element . ' ' . $this->parseType() . ' ' . $this->parseClass() . ' ' . $this->parseName() . ' ' . $this->parseId() . ' ' . $this->parseValue() . ' ' . $this->parseExtraTags() . ' ' . $this->parseElementEndTag();

    }

    /**
     * Builds the end tag of the html element
     *
     * @return string
     */
    protected function parseElementEndTag()
    {

        if ( in_array( $this->type, $this->_no_endtag_types ) ) {

            return '/>';
        }
        else {

            return '>' . $this->parseInnerHtml() . '</' . $this->element . '>';
        }

    }

    /**
     * Builds the inner html of the html element
     */
    protected function parseInnerHtml()
    {

        return $this->innerhtml;

    }

    /**
     * Builds the css class attribute
     *
     * @return Ambigous <NULL, string>
     */
    protected function parseClass()
    {

        $class = null;
        if ( is_array( $this->class ) ) {

            $class = 'class="' . implode( "", $this->class ) . ' ' . $this->tooltip_class . '"';
        }
        elseif ( $this->class ) {

            $class = 'class="' . $this->class . ' ' . $this->tooltip_class . '"';
        }
        elseif ( $this->tooltip_class ) {
            $class = 'class="' . $this->tooltip_class . '"';
        }

        return $class;

    }

    /**
     * Builds the name attribute of the html element
     *
     * @return Ambigous <NULL, string>
     */
    protected function parseName()
    {

        $name = null;
        if ( $this->name ) {

            $name = 'name="' . $this->name . '"';
        }

        return $name;

    }

    /**
     * Builds the id attribute of the html element
     *
     * @return Ambigous <NULL, string>
     */
    protected function parseId()
    {

        $id = null;
        if ( $this->id ) {

            $id = 'id="' . $this->id . '"';
        }

        return $id;

    }

    /**
     * Builds the type attribute of the html element
     *
     * @return string
     */
    protected function parseType()
    {

        if ( $this->type ) {
            return 'type="' . $this->type . '"';
        }

    }

    /**
     * Builds the extra attributes of the html element
     *
     * @return NULL|string
     */
    protected function parseExtraTags()
    {

        $extra_tags = null;
        if ( $this->extra_tags ) {

            $extra_tags = array();
            foreach ( $this->extra_tags as $array ) {

                foreach ( $array as $tag => $value ) {

                    $extra_tags[] = $tag . '="' . $value . '"';
                }
            }

            $extra_tags = implode( ' ', $extra_tags );
        }

        return $extra_tags;

    }

    /**
     * Builds the value of the html element
     *
     * @return string
     */
    protected function parseValue()
    {

        if ( isset( $this->value ) ) {

            return 'value="' . $this->value . '"';
        }

    }

    /**
     * Sets extra attributes to the html element
     *
     * @param array $tag
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function setExtraTags( array $tag )
    {

        array_push( $this->extra_tags, $tag );

        return $this;

    }

    /**
     * Sets a property of the html element object
     *
     * @param string $property
     * @param unknown $value
     * @throws RuntimeException
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function set( $property, $value )
    {

        if ( property_exists( get_class(), $property ) ) {

            $this->$property = $value;
            return $this;
        }

        throw new \RuntimeException( 'The property ' . $property . ' does not exist in ' . get_class() );

    }

    /**
     * Returns a property of the html element object
     *
     * @param string $property
     * @throws RuntimeException
     */
    public function get( $property )
    {

        if ( property_exists( get_class(), $property ) ) {

            return $this->$property;
        }

        throw new RuntimeException( 'The property ' . $property . ' does not exist in ' . get_class() );

    }

    /**
     * Overrides the tostring php magic method to use the toHtml method of this class
     *
     * @return string
     */
    public function __toString()
    {

        return $this->toHtml();

    }

    /**
     * Sets the name attribute of the html element
     *
     * @param string $name
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function setName( $name )
    {

        $this->name = $name;
        return $this;

    }

    /**
     * Sets the id attribute of the html element
     *
     * @param int $id
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function setId( $id )
    {

        $this->id = $id;
        return $this;

    }

    /**
     * Sets the inner html attribute of the html element
     *
     * @param string $innerHtml
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function setInnerHtml( $innerHtml )
    {

        $this->innerhtml = $innerHtml;
        return $this;

    }

    /**
     * Sets the class attribute of the html element
     *
     * @param string $class
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function setClass( $class )
    {

        $this->class = $class;
        return $this;

    }

    /**
     * Sets the Element Type of the html element (a, input, etc)
     *
     * @param string $element_type
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function setElementType( $element_type )
    {

        $this->element = $element_type;
        return $this;

    }

    /**
     * Sets the title attribute of the html element
     *
     * @param string $title
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function setTitle( $title )
    {

        $this->title = $title;
        return $this;

    }

    /**
     * Sets the data-toggle, data-original-title attribute of the html element
     *
     * @param string $tool_tip
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function setBootstrapTooltip( $tool_tip )
    {

        $this->title = $tool_tip;
        $this->setExtraTags( array( 'data-toggle' => 'tooltip', 'data-original-title' => $tool_tip ) );

        return $this;

    }

    /**
     * Sets the css class for bootstrap tooltips
     *
     * @param string $tooltip_class
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function setBootstrapTooltipClass( $tooltip_class )
    {

        $this->tooltip_class = $tooltip_class;
        return $this;

    }

    /**
     * Sets the type attribute of the html element
     *
     * @param string $type
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function setType( $type )
    {

        $this->type = $type;
        return $this;

    }

    /**
     * Sets the value attribute of the html element
     *
     * @param unknown $value
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement
     */
    public function setValue( $value )
    {

        $this->value = $value;
        return $this;

    }

}