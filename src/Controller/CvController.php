<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Repository\CvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AjouterCvType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ObjectManager;

class CvController extends AbstractController
{
    /**
     * @Route("/cv", name="cv")
     */
    public function index(CvRepository $cv)
    {
        return $this->render("cv/index.html.twig", [
            'cvs' => $cv->findAll()
        ]);
    }

    /**
     * @Route("/cv/ajouter", name="cv-ajouter")
     */
    public function ajouter(Request $request, ObjectManager $manager)
    {
        $cv = new Cv();

        $form = $this->createForm(AjouterCvType::class, $cv);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($cv);
            $manager->flush();

            return $this->redirectToRoute('cv');
        }

        return $this->render('cv/ajouter.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/cv/modifier", name="cv-modifier")
     */
    public function modifier(Cv $cv, Request $request)
    {
        
    }

    /**
     * @Route("/cv/supprimer", name="cv-supprimer")
     */
    public function supprimer(Cv $cv, Request $request)
    {
        
    }
}
