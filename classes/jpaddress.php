<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Jpaddress;

class Jpaddress
{
    public static function getKen($kencd)
    {
        return \Config::get('Jpaddress.kens.'.$kencd);
    }

    public static function getShortKen($kencd)
    {
        return \Config::get('Jpaddress.short_kens.'.$kencd);
    }

}
