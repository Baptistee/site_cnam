<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Article;
use App\Repository\ArticleRepository;

class AccueilController extends AbstractController
{

    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(ArticleRepository $repository): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/informations", name="informations")
     */
    public function informations(): Response
    {
        return $this->render('accueil/informations.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/projets", name="projets")
     */
    public function projets(): Response
    {
        return $this->render('accueil/projets.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/formation", name="formation")
     */
    public function formation(): Response
    {
        return $this->render('accueil/formation.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/calendrier", name="calendrier")
     */
    public function calendrier(): Response
    {
        return $this->render('accueil/calendrier.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
