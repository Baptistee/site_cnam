<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Article;
use App\Repository\ArticleRepository;

class ArticleController extends AbstractController
{ 
    /**
    * @var ArticleRepository
    */

    /**
    * @var ObjectManager
    */

   private $repository;

   /**public function __construct(ArticleRepository $repository,ObjectManager $em)
   {
       $this->repository = $repository;
       $this->em = $em;
   }
   */
    /**
     * @Route("/article", name="article")
     */
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
}
