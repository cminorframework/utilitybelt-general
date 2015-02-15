<?php
namespace CminorFramework\UtilityBelt\General\Components\Providers;

use CminorFramework\UtilityBelt\General\Contracts\Providers\IGeneralUtilityBeltServiceProvider;
use Illuminate\Container\Container;

/**
 *
 * The default service provider for the general helper instances.
 * Binds the helper instance
 *
 * @uses \Illuminate\Container\Container
 * @see https://github.com/illuminate/container
 *
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
class GeneralUtilityBeltServiceProvider extends Container implements IGeneralUtilityBeltServiceProvider
{

    /**
     * Registers all the component bindings
     */
    public function __construct()
    {
        $this->bind('CminorFramework\UtilityBelt\General\Contracts\Html\Elements\IHtmlElement', 'CminorFramework\UtilityBelt\General\Components\Html\Elements\HtmlElement', false);
        $this->bind('CminorFramework\UtilityBelt\General\Contracts\Html\Elements\ISelectboxHtmlElement', 'CminorFramework\UtilityBelt\General\Components\Html\Elements\SelectboxHtmlElement', false);
        $this->bind('CminorFramework\UtilityBelt\General\Contracts\Html\IHtmlHelper', 'CminorFramework\UtilityBelt\General\Components\Html\HtmlHelper', true);
        $this->bind('CminorFramework\UtilityBelt\General\Contracts\URI\IURIHelper', 'CminorFramework\UtilityBelt\General\Components\URI\DecoratedPost', true);
        $this->bind('CminorFramework\UtilityBelt\General\Contracts\Text\ITextHelper', 'CminorFramework\UtilityBelt\General\Components\Text\TextHelper', true);
    }


    public function attach($abstract, $concrete, $shared = false)
    {
        return $this->bind($abstract, $concrete, $shared);
    }

    public function get($abstract, $parameters = [])
    {
        return $this->make($abstract, $parameters);
    }


}