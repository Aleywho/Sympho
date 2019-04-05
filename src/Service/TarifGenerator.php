<?php

namespace App\Service;

class TarifGenerator
{
    public function getTarif($command)
    {
        dump($command);
        //créer la variables date du jour, $now = new \DateTime()

        foreach ($command->getBillets() as $billet)
        {

            //Récupère la date de naissance du billet $billet->getDatedenaissance
            //On compare now, avec date de naissance et obtient de le nombre d'année de diffèrence, if else
            //Une fois qu'on a trouvé le tarif avec if else, on appelle la méthode  $billet -> setPrix($rezul)
        }
            $rez = 4;

        //Fixer le total, grace à la méthode setTotal()$command->setTotal();
    }
}