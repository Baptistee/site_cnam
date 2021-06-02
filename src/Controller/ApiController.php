<?php

namespace App\Controller;


use App\Entity\Evenement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    /**
     * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_BDE')")
     * @Route("/api/{id}/edit", name="api_event_edit", methods={"PUT"})
     */
    public function majEvent(?Evenement $evenement,Request $request)
    {

        // récupération des données
        $donnees = json_decode($request->getContent());

        if(
            isset($donnees->title) && !empty($donnees->title) &&
            isset($donnees->start) && !empty($donnees->start) &&
            isset($donnees->description) && !empty($donnees->description) &&
            isset($donnees->backgroundColor) && !empty($donnees->backgroundColor) &&
            isset($donnees->borderColor) && !empty($donnees->borderColor) &&
            isset($donnees->textColor) && !empty($donnees->textColor) 
        ){
            //données complètes
            //initialisation d'un code
            $code = 200;

            //vérification si l'id existe
            if(!$evenement){
                //création d'un evenement
                $evenement = new Evenement;
                //changement du code
                $code = 201;
            }
            //on donne les donnée
            $evenement->setTitre($donnees->title);
            $evenement->setDescription($donnees->description);
            $evenement->setDebut(new DateTime($donnees->start));
            if($donnees->allDay){
                $evenement->setFin(new DateTime($donnees->start));
            }else{
                $evenement->setFin(new DateTime($donnees->end));
            }
            $evenement->setJourneeComplete($donnees->allDay);
            $evenement->setCouleurFond($donnees->backgroundColor);
            $evenement->setCouleurBordure($donnees->borderColor);
            $evenement->setCouleurTexte($donnees->textColor);

            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();

            //on retrourne le code
            return new Response('Ok', $code);
        }else{
            //données incomplètes
            return new Response('Données incomplètes', 404);
        }

        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
}
