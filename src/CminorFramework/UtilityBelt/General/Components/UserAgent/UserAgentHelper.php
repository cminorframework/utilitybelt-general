<?php
namespace CminorFramework\UtilityBelt\General\Components\UserAgent;

use CminorFramework\UtilityBelt\General\Contracts\UserAgent\IUserAgentHelper;
/**
 * Wrapper for the mobile detect class to detect the device of the user
 * @link https://github.com/serbanghita/Mobile-Detect
 *
 * @author Dimitrios Psarrou <dpsarrou@gmail.com> d(^_^)b
 * @link http://soundcloud.com/cminor, https://github.com/dpsarrou
 *
 */
class UserAgentHelper extends \Detection\MobileDetect implements IUserAgentHelper
{

    /**
     * Returns true if the user is running on mobile
     * @see \CminorFramework\UtilityBelt\General\Contracts\UserAgent\IUserAgentHelper::isMobile()
     */
    public function isMobile($userAgent = NULL, $httpHeaders = NULL)
    {
        return parent::isMobile();
    }


}