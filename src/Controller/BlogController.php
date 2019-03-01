<?php

namespace App\Controller;

use App\Form\BilletType;
use App\Form\VisiteurType;
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
    public function home()
    {
        return $this->render('blog/home.html.twig', ['title' => "bienvenue sur la billeterie"]);
    }

    /**
     * @Route ("/blog/new", name = "blog_create")
     */
    public function create(Request $request, ObjectManager $manager)
    {
        $billet = new Billet();
        $form = $this->createForm(VisiteurType::class);
        $form ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $manager->persist($billet);
        $manager->flush();

        return $this->redirectToRoute('blog_show');
            }
        return $this->render('blog/create.html.twig', [
            'formBillet' => $form->createView(),

        ]);
    }

    /**
     * @route("/blog/article/12", name="blog_show")
     */

    public function show()
    {
        return $this->render('blog/show.html.twig');
    }

}
