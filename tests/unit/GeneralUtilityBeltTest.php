<?php

use CminorFramework\UtilityBelt\General\Components\Providers\WordpressUtilityBeltServiceProvider;
use CminorFramework\UtilityBelt\General\Components\Containers\UtilityBeltHelpers;
use CminorFramework\UtilityBelt\General\GeneralUtilityBelt;
use CminorFramework\UtilityBelt\General\Components\Providers\GeneralUtilityBeltServiceProvider;

class GeneralUtilityBeltTest extends \Codeception\TestCase\Test
{

    use \Codeception\Specify;

    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * Test that the utility belt object is created successfully
     */
    public function testItStarts()
    {
        $wordpress_utility_belt = new GeneralUtilityBelt();
        $this->assertTrue($wordpress_utility_belt instanceof  GeneralUtilityBelt);
    }

    /**
     * Test that the default service provider is returned if the user has not explicitly set a custom one
     */
    public function testItReturnsTheDefaultServiceProvider()
    {
        $utility_belt = new GeneralUtilityBelt();
        $service_provider = $utility_belt->getServiceProvider();
        $this->assertTrue($service_provider instanceof  GeneralUtilityBeltServiceProvider);
    }

    /**
     * Test that the wordpress helpers instance is returned correctly
     */
    public function testItReturnsTheGeneralUtilityBeltHelpers()
    {
        $utility_belt = new GeneralUtilityBelt();
        $helpers = $utility_belt->getHelpers();
        $this->assertTrue($helpers instanceof  UtilityBeltHelpers);
    }

}