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
//if $difference

            //On compare now, avec date de naissance et obtient de le nombre d'année de diffèrence, if else
            //Une fois qu'on a trouvé le tarif avec if else, on appelle la méthode  $billet -> setPrix($rezul)
        }
           // $rez = 4;

        //Fixer le total, grace à la méthode setTotal()$command->setTotal();
    }
}