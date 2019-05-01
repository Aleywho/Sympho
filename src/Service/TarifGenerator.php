<?php

namespace App\Service;

use Doctrine\ORM\Entity;
use DateTime;

class TarifGenerator
{
    public function getTarif($command)
    {
        dump($command);

        $now = new \DateTime();
$total = 0;
        foreach ($command->getBillets() as $billet) {
            $datedenaissance = $billet->getDatedenaissance()->diff($now);
            $difference = $datedenaissance->y;
            dump($difference);
            $tarif = 0;
            if ($difference < 4) {
                $tarif = 0;
            } elseif ($difference < 12) {
                $tarif = 8;
                if($billet->isTarifReduit()) {
                    $tarif =$billet ::TARIFREDUIT_TARIF;
                }
            } elseif ($difference > 12 && $difference < 60) {
                $tarif = 16;
            } else {
                $tarif = 12;
            }
            $total+=$tarif;
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
