<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(): Response
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
     * @Route("/cv", name="cv")
     */
    public function cv(): Response
    {
        return $this->render('accueil/cv.html.twig', [
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
}
