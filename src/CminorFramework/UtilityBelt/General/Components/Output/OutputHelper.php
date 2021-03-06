<?php
namespace CminorFramework\UtilityBelt\General\Components\Output;

use CminorFramework\UtilityBelt\General\Contracts\Output\IOutputHelper;
/**
 * Provides output helper functions
 *
 * @package CminorFramework
 * @subpackage UtilityBelt
 * @version 0.1
 *
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
class OutputHelper implements IOutputHelper
{

    /**
     * Returns the print_r output of the element wrapped in <pre> tags
     * @since 0.1
     * @param string $element
     */
	public static function precho($element)
	{
		echo "<pre>";
		print_r($element);
		echo "</pre>";
	}


}