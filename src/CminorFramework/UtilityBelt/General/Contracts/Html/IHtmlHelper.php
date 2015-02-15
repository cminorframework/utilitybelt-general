<?php
namespace CminorFramework\UtilityBelt\General\Contracts\Html;

/**
 * Provides Html helper functions
 *
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
interface IHtmlHelper
{

    /**
     * Creates a new html element object
     * If element_type is provided, then an html element object of this type will be created
     * @param string $element_type
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\Elements\IHtmlElement
     */
    public function createHtmlElement($element_type = null);

    /**
     * Creates a new selectbox html element
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\Elements\ISelectboxHtmlElement
     */
    public function createSelectboxElement();

}