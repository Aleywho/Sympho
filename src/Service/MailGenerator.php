<?php

namespace App\Service;

use Doctrine\ORM\Entity;


class MailGenerator
{
    private  $mailer;
    private $environment;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $environment)
    {
        $this ->mailer = $mailer;
        $this ->environment =$environment;
    }


    public function sendMail($command)
    {

     $message = (new \Swift_Message('Merci de la commande'))
         ->setFrom('alexandrecurot@gmail.com')

         ->setTo($command ->getEmail())
     ->setBody($this->environment->render('blog/mailGenerator.html.twig', ['infos'=>$command]), 'text/html' ) ;

        return $this->mailer->send($message) > 0;

    }


}