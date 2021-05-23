<?php

namespace App\Controller;

use App\Repository\EvenementRepository;
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
    public function calendrier(EvenementRepository $evenement): Response
    {
        $events = $evenement->findAll();
        $rdvs = [];
        foreach($events as $event){
            $rdvs[] = [
                'id' => $event->getId(),
                'start' => $event->getDebut()->format('Y-m-d H:i:s'),
                'end' => $event->getFin()->format('Y-m-d H:i:s'),
                'title' => $event->getTitre(),
                'description' => $event->getDescription(),
                'backgroundColor' => $event->getCouleurFond(),
                'borderColor' => $event->getCouleurBordure(),
                'textColor' => $event->getCouleurTexte(),
                'allDay' => $event ->getJourneeComplete(),
            ];
        }
        $data = json_encode($rdvs);

        return $this->render('accueil/calendrier.html.twig', compact('data'));
    }

    
}
