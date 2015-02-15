<?php
namespace CminorFramework\UtilityBelt\General\Contracts\Providers;

/**
 *
 * Defines the required methods that must be implemented by a custom
 * general utility belt service provider
 *
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
interface IGeneralUtilityBeltServiceProvider
{

    public function attach($abstract, $concrete, $shared);

    public function get($abstract, $parameters);

}