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

        foreach ($command->getBillets() as $billet)
        {
       $datedenaissance = $billet->getDatedenaissance() -> diff($now);
       $difference = $datedenaissance->format('\'%y\'');
dump($difference);
if ($difference < 4) {
            $billet = 0;
        } elseif ($difference < 13) {
        $billet = 8;
        } elseif ($reduction == true) {
        $billet = 10;
        } elseif ($difference > 12 && $difference < 60) {
        $billet = 16;
        } else {
            $billet = 12;
        }
        return ($billet);
    }


    //On compare now, avec date de naissance et obtient de le nombre d'année de diffèrence, if else
            //Une fois qu'on a trouvé le tarif avec if else, on appelle la méthode  $billet -> setPrix($rezul)
        }
           // $rez = 4;

        //Fixer le total, grace à la méthode setTotal()$command->setTotal();

}