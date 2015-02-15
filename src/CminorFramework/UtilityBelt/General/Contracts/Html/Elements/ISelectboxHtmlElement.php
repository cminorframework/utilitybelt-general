<?php
namespace CminorFramework\UtilityBelt\General\Contracts\Html\Elements;

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
interface ISelectboxHtmlElement extends IHtmlElement
{

    /**
     * Sets the default option text
     *
     * @param string $default_option_text
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\Elements\ISelectboxHtmlElement
     */
    public function setDefaultOptionText( $default_option_text );

    /**
     * Sets the default option value
     *
     * @param string $default_option_value
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\Elements\ISelectboxHtmlElement
     */
    public function setDefaultOptionValue( $default_option_value );

    /**
     * Sets the default option class
     *
     * @param string $default_option_class
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\Elements\ISelectboxHtmlElement
     */
    public function setDefaultOptionClass( $default_option_class );

    /**
     * Sets the default option
     *
     * @param array $default_option_array
     *            array('text'=>'some text', 'value'=>'some value', 'class'=>'some class')
     * @throws \InvalidArgumentException
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\Elements\ISelectboxHtmlElement
     */
    public function setDefaultOption( $default_option_array );

    /**
     * Sets the value of the options that should have the selected attribute.
     *
     * @param mixed|string $selected_option_value
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\Elements\ISelectboxHtmlElement
     */
    public function setSelectedOptionValues( $selected_option_values );


    /**
     * Sets the selecbox options
     *
     * @param array $options
     *            array(array('text'=>'some text', 'value'=>'some value', 'class'=>'some class'))
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\Elements\ISelectboxHtmlElement
     */
    public function setOptions( array $options );

}