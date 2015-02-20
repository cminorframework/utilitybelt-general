<?php
namespace CminorFramework\UtilityBelt\General\Components\Containers;

use CminorFramework\UtilityBelt\General\Helpers\Html\HtmlHelper;
use CminorFramework\UtilityBelt\General\Helpers\URI\URIHelper;
use CminorFramework\UtilityBelt\General\Helpers\Text\TextHelper;
use CminorFramework\UtilityBelt\General\Components\Providers\GeneralUtilityBeltServiceProvider;
use CminorFramework\UtilityBelt\General\Contracts\Providers\IGeneralUtilityBeltServiceProvider;


/**
 * Container for the wordpress helper classes
 *
 * @package CminorFramework/Utilitybelt
 * @subpackage General
 * @version 0.4
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
class UtilityBeltHelpers
{

    /**
     * Holds the instance of the utility belt service provider
     * @var \CminorFramework\UtilityBelt\General\Contracts\Providers\IGeneralUtilityBeltServiceProvider
     */
    protected $service_provider;

    /**
     * Define the setter dependency on the service provider-container
     * @param IGeneralUtilityBeltServiceProvider $service_provider
     */
    public function setServiceProvider(IGeneralUtilityBeltServiceProvider $service_provider)
    {
        $this->service_provider = &$service_provider;
    }

    /**
     * Returns the post helper instance
     * @since 0.4
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\IHtmlHelper
     */
    public function getHtmlHelper()
    {
        return $this->service_provider->get('CminorFramework\UtilityBelt\General\Contracts\Html\IHtmlHelper');
    }

    /**
     * @return \CminorFramework\UtilityBelt\General\Contracts\Symbol\ISymbolHelper
     */
    public function getSymbolHelper()
    {
        return $this->service_provider->get('CminorFramework\UtilityBelt\General\Contracts\Symbol\ISymbolHelper');
    }

    /**
     * @return \CminorFramework\UtilityBelt\General\Contracts\Text\ITextHelper
     */
    public function getTextHelper()
    {
        return $this->service_provider->get('CminorFramework\UtilityBelt\General\Contracts\Text\ITextHelper');
    }

    /**
     * @return \CminorFramework\UtilityBelt\General\Contracts\Html\IHtmlWrapper
     */
    public function getHtmlWrapper()
    {
        return $this->service_provider->get('CminorFramework\UtilityBelt\General\Contracts\Html\IHtmlWrapper');
    }

    /**
     * Returns the output helper
     * @since 0.2
     * @return \CminorFramework\UtilityBelt\General\Contracts\Output\IOutputHelper
     */
    public function getOutputHelper()
    {
        return $this->service_provider->get('CminorFramework\UtilityBelt\General\Contracts\Output\IOutputHelper');
    }

    /**
     * Returns the URI helper
     * @since 0.2
     * @return \CminorFramework\UtilityBelt\General\Contracts\URI\IURIHelper
     */
    public function getURIHelper()
    {
        return $this->service_provider->get('CminorFramework\UtilityBelt\General\Contracts\URI\IURIHelper');
    }

    /**
     * Returns the user agent helper
     * @return \CminorFramework\UtilityBelt\General\Contracts\UserAgent\IUserAgentHelper
     */
    public function getUserAgentHelper()
    {
        return $this->service_provider->get('CminorFramework\UtilityBelt\General\Contracts\UserAgent\IUserAgentHelper');
    }



}