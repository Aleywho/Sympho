<?php


namespace tests\AppBundle\Service;

use App\Service\TarifGenerator;
use PHPUnit\Framework\TestCase;

class TarifGeneratorTest extends TestCase
{
    public function testgetTarif()
    {
        $tarif = new TarifGenerator();
        $result = $tarif->add(16, 8);


        $this->assertEquals(24, $result);
    }
}