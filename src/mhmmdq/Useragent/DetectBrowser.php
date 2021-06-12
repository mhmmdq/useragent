<?php

namespace Mhmmdq\Useragent;

class DetectBrowser{

    /**
     * @var mixed
     */
    private static $userAgent;

    /**
     * @var string[]
     */
    private static $browsers = array (
        'Vivaldi'=>'Vivaldi',
        'Edg' => 'Microsoft edge',
        'Trident\/7.0' => 'Internet Explorer 11',
        'Beamrise' => 'Beamrise',
        'Opera' => 'Opera',
        'OPR' => 'Opera',
        'Shiira' => 'Shiira',
        'Chimera' => 'Chimera',
        'Phoenix' => 'Phoenix',
        'Firebird' => 'Firebird',
        'Camino' => 'Camino',
        'Netscape' => 'Netscape',
        'OmniWeb' => 'OmniWeb',
        'Konqueror' => 'Konqueror',
        'icab' => 'iCab',
        'Lynx' => 'Lynx',
        'Links' => 'Links',
        'hotjava' => 'HotJava',
        'amaya' => 'Amaya',
        'IBrowse' => 'IBrowse',
        'iTunes' => 'iTunes',
        'Silk' => 'Silk',
        'Dillo' => 'Dillo',
        'Maxthon' => 'Maxthon',
        'Arora' => 'Arora',
        'Galeon' => 'Galeon',
        'Iceape' => 'Iceape',
        'Iceweasel' => 'Iceweasel',
        'Midori' => 'Midori',
        'QupZilla' => 'QupZilla',
        'Namoroka' => 'Namoroka',
        'NetSurf' => 'NetSurf',
        'BOLT' => 'BOLT',
        'EudoraWeb' => 'EudoraWeb',
        'shadowfox' => 'ShadowFox',
        'Swiftfox' => 'Swiftfox',
        'Uzbl' => 'Uzbl',
        'UCBrowser' => 'UCBrowser',
        'Kindle' => 'Kindle',
        'wOSBrowser' => 'wOSBrowser',
        'Epiphany' => 'Epiphany',
        'SeaMonkey' => 'SeaMonkey',
        'Avant Browser' => 'Avant Browser',
        'Firefox' => 'Firefox',
        'Chrome' => 'Google Chrome',
        'MSIE' => 'Internet Explorer',
        'Internet Explorer' => 'Internet Explorer',
        'Safari' => 'Safari',
        'Mozilla' => 'Mozilla',
    );

    /**
     * DetectBrowser constructor.
     * @param null $useragent
     */
    public function __construct($useragent = null)
    {
        self::$userAgent = !empty($useragent) ? $useragent : $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * @return array
     */
    public static function analyze() {
        foreach(self::$browsers as $pattern => $name) {
            if( preg_match("/".$pattern."/i",self::$userAgent, $match)) {
                $browserName = $name;

                $known = array('Version', $pattern, 'other');
                $pattern_version = '#(?<browser>' . join('|', $known).')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
                if (!preg_match_all($pattern_version, self::$userAgent, $matches)) {
                    $browserVersion = 'Version not detected';
                }

                $i = count($matches['browser']);
                if ($i != 1) {


                    if (strripos(self::$userAgent,"Version") < strripos(self::$userAgent,$pattern)){
                        @$browserVersion = $matches['version'][0];
                    }
                    else {
                        @$browserVersion = $matches['version'][1];
                    }
                }
                else {
                    $browserVersion = $matches['version'][0];
                }
                break;
            }
        }
        return ['name'=>$browserName , 'version'=>$browserVersion];
    }

}