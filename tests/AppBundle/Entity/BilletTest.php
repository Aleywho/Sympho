<?php

namespace tests\AppBundle\Entity;

use App\Entity\Billet;
use PHPUnit\Framework\TestCase;

class BilletTest extends TestCase
{
    public function testbillet()
    {
        $billet = new Billet();

        $this->assertSame(1.1, $billet->Billet());
    }
}