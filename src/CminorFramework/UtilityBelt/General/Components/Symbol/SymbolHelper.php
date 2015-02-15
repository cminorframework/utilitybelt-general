<?php
namespace CminorFramework\UtilityBelt\General\Components\Symbol;

class SymbolHelper
{

    public function issetOrNull($variable, $default = null)
    {
        return isset($variable) ? $variable : ($default ? $default : null);
    }

}