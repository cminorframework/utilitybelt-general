<?php
namespace CminorFramework\UtilityBelt\General\Contracts\UserAgent;
/**
 * Wrapper for the mobile detect class to detect the device of the user
 * @link https://github.com/serbanghita/Mobile-Detect
 *
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
interface IUserAgentHelper
{

    /**
     * Checks if the user is running on a mobile
     * @return bool true|false
     */
    public function isMobile($userAgent = NULL, $httpHeaders = NULL);


}