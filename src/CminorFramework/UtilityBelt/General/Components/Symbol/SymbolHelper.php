<?php
namespace CminorFramework\UtilityBelt\General\Components\Symbol;

use CminorFramework\UtilityBelt\General\Contracts\Symbol\ISymbolHelper;
class SymbolHelper implements ISymbolHelper
{

    public function issetOrNull($variable, $default = null)
    {
        return isset($variable) ? $variable : ($default ? $default : null);
    }

}