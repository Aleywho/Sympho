<?php

namespace App\Service;

use Doctrine\ORM\Entity;
use DateTime;

class TarifGenerator

{
    public function getTarif($command)
    {
        $now = new \DateTime();
        $total = 0;
        foreach ($command->getBillets() as $billet) {
            $datedenaissance = $billet->getDatedenaissance()->diff($now);
            $difference = $datedenaissance->y;
            $tarif = 0;
            if ($difference < 4) {
                $tarif = $billet::TARIF_ENFANT;
            } elseif ($difference < 12) {
                $tarif = $billet::TARIF_ADO;
            } elseif ($billet->getTarifReduit()) {
                $tarif = $billet::TARIF_REDUIT;
            } elseif ($difference > 12 && $difference < 60) {
                $tarif = $billet::TARIF_NORMAL;
            } else {
                $tarif = $billet::TARIF_SENIOR;
            }
            $total += $tarif;
            $billet->setPrix($tarif);
        }
        $command->setTotal($total);

    }


}
