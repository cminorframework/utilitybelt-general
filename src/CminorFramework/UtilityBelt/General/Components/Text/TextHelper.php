<?php
namespace CminorFramework\UtilityBelt\General\Helpers\Text;

/**
 * Helper class to provide helpful text functions
 *
 * @version 0.2
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
class TextHelper
{

    /**
     * Limits the input string to the specified characters
     * @since 0.1
     * @param string $text
     * @param number $max_characters
     * @param $append_ellipses_for_shorter_text Text to append at the end of the text if it's shorter
     * @return string
     */
    public function limitString($text, $max_characters = 150, $append_ellipses_for_shorter_text = null)
    {
        //if we have no text, return
        if(!$text){
            return null;
        }

        $limited_text = $text;
        //remove the rest of the string if it exceeds the maximum characters
        if ( strlen($text) > (int) $max_characters){

            $limited_text = substr($text, 0, $max_characters).$append_ellipses_for_shorter_text;

        }

        return $limited_text;

    }

}