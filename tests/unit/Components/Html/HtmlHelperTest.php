<?php

use CminorFramework\UtilityBelt\General\GeneralUtilityBelt;
use CminorFramework\UtilityBelt\General\Components\Providers\GeneralUtilityBeltServiceProvider;
use CminorFramework\UtilityBelt\General\Components\Containers\UtilityBeltHelpers;
use CminorFramework\UtilityBelt\General\Components\Html\HtmlHelper;

class HtmlHelperTest extends \Codeception\TestCase\Test
{

    use \Codeception\Specify;

    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $helpers;

    protected function _before()
    {
        $utility_belt = new GeneralUtilityBelt();
        $helpers = $utility_belt->getHelpers();
        $this->helpers = $helpers;
    }

    protected function _after()
    {
    }

    /**
     * Test that the html helper default instance is returned
     */
    public function testItReturnsTheDefaultHelperInstance()
    {
        $html_helper = $this->helpers->getHtmlHelper();
        $this->assertTrue($html_helper instanceof  HtmlHelper);
    }


}