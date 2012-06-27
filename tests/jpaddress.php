<?php
/**
 * Package Jpaddress tests
 *
 * @group Package
 */
class Test_Jpaddress extends TestCase
{

    public function testGetKenName()
    {
        $this->assertEquals('大阪府', Jpaddress::getKenName(27));

    }
    
    public function testGetShortKenName()
    {
        $this->assertEquals('大阪', Jpaddress::getShortKenName(27));
    }

    public function testGetJushoByZip()
    {
        $this->assertEquals('大阪府大阪市北区中津', Jpaddress::getJushoByZip('5310071'));
        $this->assertEquals('大阪府大阪市北区豊崎', Jpaddress::getJushoByZip('531-0072'));

        $this->assertEquals('', Jpaddress::getJushoByZip('531-9999'));
        $this->assertEquals('', Jpaddress::getJushoByZip('5319999'));
    }

    public function testGetKencdAndJushoByZip()
    {
        $this->assertEquals(array('kencd' => 27, 'jusho' => '大阪市北区中津'), Jpaddress::getKencdAndJushoByZip('5310071'));
        $this->assertEquals(array('kencd' => 27, 'jusho' => '大阪市北区豊崎'), Jpaddress::getKencdAndJushoByZip('531-0072'));

        $this->assertEquals(array('kencd' => '', 'jusho' => ''), Jpaddress::getKencdAndJushoByZip('531-9999'));
        $this->assertEquals(array('kencd' => '', 'jusho' => ''), Jpaddress::getKencdAndJushoByZip('5319999'));
    }
}
