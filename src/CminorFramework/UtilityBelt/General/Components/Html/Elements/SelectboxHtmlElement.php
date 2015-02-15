<?php
namespace CminorFramework\UtilityBelt\General\Components\Html\Elements;

use CminorFramework\UtilityBelt\General\Contracts\Html\Elements\ISelectboxHtmlElement;
/**
 *
 * Creates a SelectObox html element
 *
 * @package CminorFramework\UtilityBelt\General\Helpers\Html
 * @subpackage Elements
 * @version 0.1
 *
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
class SelectboxHtmlElement extends HtmlElement implements ISelectboxHtmlElement
{

    /**
     * Holds the option array from which the html options will be built
     *
     * @var array
     */
    protected $options = array();

    /**
     * Holds the default option text
     *
     * @var string
     */
    protected $default_text;

    /**
     * Holds the default option value
     *
     * @var unknown
     */
    protected $default_value;

    /**
     * Holds the default option css class attribute
     *
     * @var unknown
     */
    protected $default_option_class;

    /**
     * Holds the option values that should be selected
     *
     * @var array
     */
    protected $selected_values;

    public function __construct()
    {
        // set the element type to Html Select
        $this->element = 'select';

    }

    /**
     * Parses the inner html text of the selectbox
     *
     * @see \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\HtmlElement::parseInnerHtml()
     */
    // @override
    protected function parseInnerHtml()
    {

        // initialize the array to hold the option
        $options = array();

        // add a default option element if we have one
        if ( $this->default_value || $this->default_text ) {
            $options = array( '<option value="' . $this->default_value . '" class="' . $this->default_option_class . '">' . $this->default_text . '</option>' );
        }

        // do this only if we have some options to be built
        if ( $this->options ) {

            foreach ( $this->options as $option ) {

                // check if the current option should be selected or not
                $selected = $this->_checkSelectedOption( $option['value'] );

                // append the css class attribute
                $class = null;
                if ( isset($option['class']) ) {

                    $class = 'class="' . $option['class'] . '"';
                }

                // build the html option tag
                $options[] = '<option ' . $class . ' value="' . $option['value'] . '" ' . $selected . '>' . $option['text'] . '</option>';
            }
        }

        return implode( "", $options );
        ;

    }

    /**
     * Sets the default option text
     *
     * @param string $default_option_text
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\SelectboxHtmlElement
     */
    public function setDefaultOptionText( $default_option_text )
    {

        $this->default_text = $default_option_text;
        return $this;

    }

    /**
     * Sets the default option value
     *
     * @param string $default_option_value
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\SelectboxHtmlElement
     */
    public function setDefaultOptionValue( $default_option_value )
    {

        $this->default_value = $default_option_value;
        return $this;

    }

    /**
     * Sets the default option class
     *
     * @param string $default_option_class
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\SelectboxHtmlElement
     */
    public function setDefaultOptionClass( $default_option_class )
    {

        $this->default_option_class = $default_option_class;
        return $this;

    }

    /**
     * Sets the default option
     *
     * @param array $default_option_array
     *            array('text'=>'some text', 'value'=>'some value', 'class'=>'some class')
     * @throws \InvalidArgumentException
     */
    public function setDefaultOption( $default_option_array )
    {

        if ( ! $default_option_array ) {
            throw new \InvalidArgumentException( __CLASS__ . '->' . __FUNCTION__ . '()' . __LINE__ . ': Invalid default option array' );
        }

        $this->default_text = isset( $default_option_array['text'] ) ? $default_option_array['text'] : null;
        $this->default_value = isset( $default_option_array['value'] ) ? $default_option_array['value'] : null;
        $this->default_option_class = isset( $default_option_array['class'] ) ? $default_option_array['class'] : null;

    }

    /**
     * Sets the value of the options that should have the selected attribute.
     *
     * @param mixed|string $selected_option_value
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\SelectboxHtmlElement
     */
    public function setSelectedOptionValues( $selected_option_values )
    {

        $selected_values = array();

        //for multiple select
        if ( is_array( $selected_option_values ) ) {

            //loop through the values and create a nice associative array
            foreach ( $selected_option_values as $value ) {
                $selected_values[$value] = $value;
            }
        }
        else {

            $selected_values[$selected_option_values] = $selected_option_values;
        }

        $this->selected_values = $selected_values;

        return $this;

    }

    /**
     * Finds if the current option is on the selected option list and returns the selected attribute
     *
     * @param unknown $current_value
     * @return Ambigous <NULL, string>
     */
    protected function _checkSelectedOption( $current_value )
    {

        $selected = null;
        if ( isset( $this->selected_values[$current_value] ) ) {
            $selected = 'selected="selected"';
        }

        return $selected;

    }

    /**
     * Sets the selecbox options
     *
     * @param array $options
     *            array(array('text'=>'some text', 'value'=>'some value', 'class'=>'some class'))
     * @return \CminorFramework\UtilityBelt\General\Helpers\Html\Elements\SelectboxHtmlElement
     */
    public function setOptions( array $options )
    {

        $this->options = $options;
        return $this;

    }

}