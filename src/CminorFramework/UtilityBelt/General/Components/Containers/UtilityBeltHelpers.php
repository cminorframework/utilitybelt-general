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


    public function getTextHelper()
    {
        if(!isset($this->text_helper)){
            $this->text_helper = new TextHelper();
        }

        return $this->text_helper;
    }

    /**
     * Returns the output helper
     * @since 0.2
     * @return \CminorFramework\UtilityBelt\General\Helpers\Output\OutputHelper
     */
    public function getOutputHelper()
    {

        if ( ! isset( $this->output_helper ) ) {
            $this->output_helper = new OutputHelper();
        }
        return $this->output_helper;

    }

    /**
     * Returns the URI helper
     * @since 0.2
     * @return \CminorFramework\UtilityBelt\General\Helpers\URI\URIHelper
     */
    public function getURIHelper()
    {

        if ( ! isset( $this->uri_helper ) ) {
            $this->uri_helper = new URIHelper();
        }

        return $this->uri_helper;

    }



}