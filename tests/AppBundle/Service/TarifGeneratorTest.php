<?php


namespace tests\AppBundle\Service;

use App\Entity\Billet;
use App\Entity\Visiteur;
use App\Service\TarifGenerator;
use PHPUnit\Framework\TestCase;

class TarifGeneratorTest extends TestCase
{
    //test de billets
    public function testgetTarif()
    {
        $tarif = new TarifGenerator();
        $command = new Visiteur();
        $billet = new Billet();

        $billet ->setNom('Michel');
        $billet ->setDatedenaissance(new \DateTime('1950-12-15'));
        $billet ->setTarifReduit(false);

        $billet2= new Billet();
        $billet2-> setDatedenaissance(new \DateTime('1950-08-20'));
        $billet2 ->setTarifReduit(false);
        $command ->addBillet($billet);
        $command ->addBillet($billet2);
        $tarif->getTarif($command);



        $this->assertEquals(24,$command->getTotal());

    }
// Test tarif Réduit, et tarif normal
    public function testTarifReduit()
    {
        $tarif = new TarifGenerator();
        $command =new Visiteur();
        $billet = new Billet();

        $billet->setDatedenaissance(new \DateTime('1970-09-25'));
        $billet->setTarifReduit(true);
        $billet2= new Billet();
        $billet2-> setDatedenaissance(new \DateTime('1980-02-04'));
        $billet2 ->setTarifReduit(false);
        $command ->addBillet($billet);
        $command ->addBillet($billet2);
        $tarif->getTarif($command);

        $this->assertEquals(26,$command->getTotal());
    }
}
