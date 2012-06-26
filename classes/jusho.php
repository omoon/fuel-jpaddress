<?php
/**
 * A very flexible, full and easy jpaddress solution for FuelPHP
 *
 * @package		Jpaddress
 * @version		1.0
 * @author		Sotaro OMURA (omoon)
 * @license		MIT License
 * @copyright	2012 omoon
 * @link		http://omoon.org
 */

namespace Jpaddress;

class Jusho
{
    public static function getJushoByZip($zip)
    {
        if (preg_match("/(\d{3})\-?(\d{4})/", $zip, $match)) {
            $zip = sprintf("%s-%s", $match[1], $match[2]); 
        } else {
            return '';
        }

        $ret = json_decode(file_get_contents("http://www.google.com/transliterate?langpair=ja-Hira|ja&text=" . $zip));
        if ($ret[0][1][1] == $zip) {
            return $ret[0][1][0];
        }
    }

}
