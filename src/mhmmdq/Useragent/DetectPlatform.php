<?php

namespace Mhmmdq\Useragent;

class DetectPlatform {

    /**
     * @var mixed
     */
    private static $userAgent;

    /**
     * @var string[]
     */
    private static $platforms = array(
        'windows' => 'Windows',
        'iPad' => 'iPad',
        'iPod' => 'iPod',
        'iPhone' => 'iPhone',
        'mac' => 'Apple',
        'android' => 'Android',
        'linux' => 'Linux',
        'Nokia' => 'Nokia',
        'BlackBerry' => 'BlackBerry',
        'FreeBSD' => 'FreeBSD',
        'OpenBSD' => 'OpenBSD',
        'NetBSD' => 'NetBSD',
        'UNIX' => 'UNIX',
        'DragonFly' => 'DragonFlyBSD',
        'OpenSolaris' => 'OpenSolaris',
        'SunOS' => 'SunOS',
        'OS\/2' => 'OS/2',
        'BeOS' => 'BeOS',
        'win' => 'Windows',
        'Dillo' => 'Linux',
        'PalmOS' => 'PalmOS',
        'RebelMouse' => 'RebelMouse'
    );

    /**
     * DetectPlatform constructor.
     * @param null $useragent
     */
    public function __construct($useragent = null)
    {
        self::$userAgent = !empty($useragent) ? $useragent : $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * @return string
     */
    public static function analyze() {
        foreach(self::$platforms as $key => $platform) {
            if (stripos(self::$userAgent, $key) !== false) {
                return $platform;
                break;
            }
        }
    }

}