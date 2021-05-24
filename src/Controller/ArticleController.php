<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
        $articles = $this->getDoctrine()->getRepository(Article::class);
        $articles = $articles->findAll();
        return $this->render('article/index.html.twig', 
        array('articles' => $articles));
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @IsGranted("ROLE_BDE")
     * @Route("/article/ajouter")
     */
    public function createAction(Request $request) {

        $articles = new Article();

        $form = $this->createFormBuilder($articles)
            ->add('Titre', TextType::class)
            ->add('Description', TextType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $articles = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($articles);
            $em->flush();
            echo 'Envoyé';
        }
        return $this->render('article/ajouter.html.twig', [
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
            'article/voir.html.twig',
            array('Article' => $article)
        );
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @IsGranted("ROLE_BDE")
     * @Route("article/supprimer/{id}" , name="article_delete")
     */
    public function deleteAction($id) {
        $em = $this->getDoctrine()->getManager();
        $article = $this->getDoctrine()->getRepository(Article::class);
        $article = $article->find($id);
        if (!$article) {
            throw $this->createNotFoundException(
                'There are no articles with the following id: ' . $id
            );
        }
        $em->remove($article);
        $em->flush();
        return $this->redirect($this->generateUrl('article'));
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @IsGranted("ROLE_BDE")
     * @Route("article/modifier/{id}", name="article_edit")
     */
    public function updateAction(Request $request, $id) {
        $article = $this->getDoctrine()->getRepository(Article::class);
        $article = $article->find($id);
        if (!$article) {
            throw $this->createNotFoundException(
                'There are no articles with the following id: ' . $id
            );
        }
        $form = $this->createFormBuilder($article)
            ->add('titre', TextType::class)
            ->add('description', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Editer'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $article = $form->getData();
            $em->flush();
            return $this->redirect($this->generateUrl('article'));
        }
        return $this->render(
            'article/modifier.html.twig',
            array('form' => $form->createView())
        );
    }
}
