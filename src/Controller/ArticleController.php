<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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


    /**
     * @Route("/article", name="article")
     */
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    /**
     * @Route("/article/new")
     */
    public function createAction(Request $request) {
        $articles = new Article();
        $form = $this->createFormBuilder($articles)
            ->add('Titre', TextType::class)
            ->add('Description', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Valider'])
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $articles = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($articles);
            $em->flush();
            echo 'Envoyé';
        }
        return $this->render('article/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/article/{id}")
     */
    public function viewAction($id) {
        $article = $this->getDoctrine()->getRepository(Article::class);
        $article = $article->find($id);
        if (!$article) {
            throw $this->createNotFoundException(
                'Aucun article pour l\'id: ' . $id
            );
        }
        return $this->render(
            'article/view.html.twig',
            array('article' => $article)
        );
    }
}
