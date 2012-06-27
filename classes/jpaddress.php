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

class Jpaddress
{

    /**
     * 都道府県コードから都道府県名を取得
	 *
	 * @param  num    $kencd 都道府県コード
     *
	 * @return string 都道府県名
	 */
    public static function getKenName($kencd)
    {
        return \Config::get('jpaddress.kens.'.$kencd);
    }

    /**
     * 都道府県コードから短い都道府県名（末尾の都道府県を除いたもの）を取得
	 *
	 * @param  num    $kencd 都道府県コード
     *
	 * @return string 短い都道府県名
	 */
    public static function getShortKenName($kencd)
    {
        return \Config::get('jpaddress.short_kens.'.$kencd);
    }

    /**
     * 住所から都道府県コードを取得
	 *
	 * @param  string $jusho 住所
     *
	 * @return num 都道府県コード
	 */
    public static function getKencdByJusho($jusho)
    {
        foreach(\Config::get('jpaddress.kens') as $kencd => $ken) {
            if (preg_match("/^($ken)(.*)$/u", $jusho, $match)) {
                return $kencd;
            }
        }
        return '';
    }

    /**
     * 郵便番号から住所を取得。Google API を利用
	 *
	 * @param  string $zip 郵便番号
     *
	 * @return string 住所
	 */
    public static function getJushoByZip($zip)
    {
        if (preg_match("/(\d{3})\-?(\d{4})/", $zip, $match)) {
            $zip = sprintf("%s-%s", $match[1], $match[2]); 
        } else {
            return '';
        }
        return static::getJushoFromGoogle($zip);

    }

    /**
     * 郵便番号から都道府県コードと都道府県を除いた住所の配列を取得
	 *
	 * @param  string $zip 郵便番号
     *
	 * @return array 都道府県コード、住所
	 */
    public static function getKencdAndJushoByZip($zip)
    {
        $return = array('kencd' => '', 'jusho' => '');

        $jusho = static::getJushoByZip($zip);
        $kencd = static::getKencdByJusho($jusho);
        $jusho = preg_replace("/^" . static::getKenName($kencd) . "/", "", $jusho);
        $return['jusho'] = $jusho;
        $return['kencd'] = $kencd;

        return $return;
    }

    /**
     * 郵便番号から住所を取得。Google API を利用
	 *
	 * @param  string $zip 郵便番号
     *
	 * @return string 住所
	 */
    public function getJushoFromGoogle($zip)
    {
        $ret = json_decode(file_get_contents("http://www.google.com/transliterate?langpair=ja-Hira|ja&text=" . $zip));
        if ($ret[0][1][1] == $zip) {
            return $ret[0][1][0];
        }
        return '';
    }

}
