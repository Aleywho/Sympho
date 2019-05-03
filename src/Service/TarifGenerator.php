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
            dump($difference);
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
//modifier rajouter, tarif réduit, et entity tarif réduit
        //On compare now, avec date de naissance et obtient de le nombre d'année de diffèrence, if else
        //Une fois qu'on a trouvé le tarif avec if else, on appelle la méthode  $billet -> setPrix($rezul)
    }
    // $rez = 4;

    //Fixer le total, grace à la méthode setTotal()$command->setTotal();

}
