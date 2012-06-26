fuel-jpaddress
==============

A package for FulePHP handling Japanese addresses.

## コードから都道府県名を取得
    Jpaddress\Ken::getName(27);         // 大阪府
    Jpaddress\Ken::getShortName(27);    // 大阪

## 郵便番号から住所を取得
    Jpaddress\Jusho::getJushoByZip('531-0071'));    // 大阪府大阪市北区中津
    Jpaddress\Jusho::getJushoByZip('5310071'));     // 大阪府大阪市北区中津
