<?php
namespace CminorFramework\UtilityBelt\General;

use CminorFramework\UtilityBelt\General\Components\Providers\GeneralUtilityBeltServiceProvider;
use CminorFramework\UtilityBelt\General\Contracts\Providers\IGeneralUtilityBeltServiceProvider;
use CminorFramework\UtilityBelt\General\Components\Containers\UtilityBeltHelpers;


/**
 * The General Utility Belt
 *
 * @package CminorFramework/UtilityBelt
 * @subpackage General
 * @version 0.5
 *
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
class GeneralUtilityBelt
{

    /**
     * Holds the utility belt service provider instance
     * @var \CminorFramework\UtilityBelt\General\Contracts\Providers\IGeneralUtilityBeltServiceProvider
     */
    protected $service_provider;

    /**
     * Holds the general utility belt helpers container instance
     * @var \CminorFramework\UtilityBelt\General\Components\Containers\UtilityBeltHelpers
     */
    protected $utility_belt_helpers;

    /**
     * Binds a general utility belt service provider to resolve the utility belt components
     *
     * @param \CminorFramework\UtilityBelt\General\Contracts\Providers\IGeneralUtilityBeltServiceProvider $service_provider
     */
    public function _bindServiceProvider(IGeneralUtilityBeltServiceProvider $service_provider)
    {

        $this->service_provider = $service_provider;

    }

    /**
     * Returns the utility belt service provider
     * @return \CminorFramework\UtilityBelt\General\Contracts\Providers\IGeneralUtilityBeltServiceProvider
     */
    public function getServiceProvider()
    {

        /*
         * Initialize the service provider with the utility belt's default provider
         * if a custom one has not been set before
         */
        if(!isset($this->service_provider)){

            $this->service_provider = new GeneralUtilityBeltServiceProvider();

        }

        return $this->service_provider;
    }

    /**
     * Returns the general utility belt helpers contaniner singleton instance
     *
     * @return \CminorFramework\UtilityBelt\General\Components\Containers\UtilityBeltHelpers
     */
    public function getHelpers()
    {

        if( !isset($this->utility_belt_helpers) ){

            $utility_belt_helpers = new UtilityBeltHelpers();
            $utility_belt_helpers->setServiceProvider($this->getServiceProvider());

            $this->utility_belt_helpers = $utility_belt_helpers;
        }

        return $this->utility_belt_helpers;

    }

}