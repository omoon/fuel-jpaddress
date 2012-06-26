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

class Ken
{
    public static function getName($kencd)
    {
        return \Config::get('jpaddress.kens.'.$kencd);
    }

    public static function getShortName($kencd)
    {
        return \Config::get('jpaddress.short_kens.'.$kencd);
    }

}
