<?php
require __DIR__ . '/../classes/jusho.php';
class Test_Jusho extends PHPUnit_Framework_TestCase
{
    public function testGetJushoByZip()
    {
        $this->assertEquals('大阪府大阪市北区中津', Jpaddress\Jusho::getJushoByZip('5310071'));
        $this->assertEquals('大阪府大阪市北区豊崎', Jpaddress\Jusho::getJushoByZip('531-0072'));

        $this->assertEquals('', Jpaddress\Jusho::getJushoByZip('531-9999'));
        $this->assertEquals('', Jpaddress\Jusho::getJushoByZip('5319999'));
    }
}
?>
