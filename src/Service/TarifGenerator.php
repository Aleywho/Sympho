<?php

namespace App\Service;

class TarifGenerator
{
    public function getTarif($command, $datedenaissance)
    {
        dump($command);

        $now = new \DateTime();
        $age1 =$datedenaissance->diff($now);
        $age = $age1;



        foreach ($command->getBillets() as $billet)
        {
        $billet->getDatedenaissance;

            //Récupère la date de naissance du billet $billet->getDatedenaissance
            //On compare now, avec date de naissance et obtient de le nombre d'année de diffèrence, if else
            //Une fois qu'on a trouvé le tarif avec if else, on appelle la méthode  $billet -> setPrix($rezul)
        }
            $rez = 4;

        //Fixer le total, grace à la méthode setTotal()$command->setTotal();
    }
}