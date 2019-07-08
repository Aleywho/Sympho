<?php

namespace tests\AppBundle\Entity;

use App\Entity\Visiteur;
use PHPUnit\Framework\TestCase;

class VisiteurTest extends TestCase
{
    public function testVisiteurValidation()
    {
        $visiteur = new Visiteur();
    }
}