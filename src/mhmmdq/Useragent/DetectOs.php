<?php

namespace Mhmmdq\Useragent;

class DetectOs {

    /**
     * @var mixed
     */
    private static $userAgent;

    /**
     * @var string[]
     */
    private static $os_array = array(
        '/windows nt 10/i'      =>  'Windows 10',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iOS',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPadOs',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
    );

    /**
     * DetectOs constructor.
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
        $os_platform  = "Unknown OS Platform";
        foreach (self::$os_array as $regex => $value)
            if (preg_match($regex, self::$userAgent))
                $os_platform = $value;

        return $os_platform;
    }

}