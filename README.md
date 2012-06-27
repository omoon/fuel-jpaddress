fuel-jpaddress
==============

A package for FulePHP handling Japanese addresses.

## コードから都道府県名を取得
    Jpaddress::getKenName(27);         // 大阪府
    Jpaddress::getShortKenName(27);    // 大阪

## 郵便番号から住所を取得
    Jpaddress::getJushoByZip('531-0071'));    // 大阪府大阪市北区中津
    Jpaddress::getJushoByZip('5310071'));     // 大阪府大阪市北区中津

## 郵便番号から都道府県コードと都道府県を除いた住所を取得
    Jpaddress::getKencdAndJushoByZip('531-0071'));    // array('kencd' => 27, 'jusho' => '大阪市北区中津')
    Jpaddress::getKencdAndJushoByZip('5310071'));    // array('kencd' => 27, 'jusho' => '大阪市北区中津')
