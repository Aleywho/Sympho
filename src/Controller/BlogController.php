<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation\Article;
use Symfony\Component\Routing\Annotation\Route;

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
    return $this->render('blog/home.html.twig',['title' => "bienvenue sur la billeterie"]);
}

    /**
     * @route("/blog/article/12", name="blog_show")
     */

public function show(){
    return $this->render('blog/show.html.twig');
}

    /**
     * @Route ("/blog/new", name = "blog_create")
     */
public function create(){

    return $this->render('blog/create.html.twig');
}
}
