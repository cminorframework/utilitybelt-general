<?php
namespace CminorFramework\UtilityBelt\General\Contracts\Text;

interface ITextHelper
{

    /**
     * Limits the input string to the specified characters
     * @param string $text
     * @param number $max_characters
     * @param $append_ellipses_for_shorter_text Text to append at the end of the text if it's shorter
     * @return string
     */
    public function limitString($text, $max_characters = 150, $append_ellipses_for_shorter_text = null);

}