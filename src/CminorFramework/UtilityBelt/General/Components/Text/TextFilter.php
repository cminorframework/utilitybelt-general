<?php
class TextFilter
{

    public static function decodeHtml($string)
    {
        if( empty($string) ){
            return null;
        }
        return html_entity_decode($string);
    }


}