<?php

namespace tests\AppBundle\Entity;

use App\Entity\Billet;
use PHPUnit\Framework\TestCase;

class BilletTest extends TestCase
{
    public function testsetTarifReduit()
    {
        $billet= new Billet('un tarif', Billet::TARIF_NORMAL,2.0625 );
        $this->assertSame(33, $billet->getTarifReduit());
    }
}