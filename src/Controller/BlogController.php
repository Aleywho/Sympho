<?php

namespace App\Controller;

use App\Form\BilletType;
use App\Form\VisiteurType;
use App\Service\MailGenerator;
use App\Service\TarifGenerator;
use Doctrine\Common\Persistence\ObjectManager;
use function Sodium\add;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation\Article;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Billet;
use App\Entity\Visiteur;
use App\Repository\BilletRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(MailGenerator $mailGenerator)
    {

        return $this->render('blog/home.html.twig', ['title' => "bienvenue sur la billeterie"]);
    }

    /**
     * @Route ("/blog/new", name = "blog_create")
     */
    public function create(Request $request, ObjectManager $manager, TarifGenerator $tarif)
    {
        dump(date('G'));
        $command = new Visiteur();
        $form = $this->createForm(VisiteurType::class, $command);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dump($form->getData());

            $tarif->getTarif($command);

            $manager->persist($form->getData());
            $manager->flush();

            return $this->redirectToRoute('order', [
                'id' => $command->getId(),
            ]);
        }
        return $this->render('blog/create.html.twig', [
            'formBillet' => $form->createView(),

        ]);
    }

    /**
     * @route("/order/{id}", name="order")
     */


    public function show($id, MailGenerator $mailGenerator)
    {
        $command = $this->getDoctrine()
            ->getRepository(Visiteur::class)
            ->find($id);
        if (!$command) {
            throw $this->createNotFoundException('Pas de commande trouvée' . $id
            );
        }
        $mailGenerator ->sendMail($command);

        return $this->render('blog/order.html.twig', [
            'infos' => $command
        ]);
    }

    /**
     * @route("/sucess/{id}", name="sucess")
     */

    public function sucess($id)
    {
        return $this->render('blog/sucess.html.twig', [
            'id' => $id
        ]);
    }
}