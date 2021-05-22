<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Repository\CvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EditUserType;
use Symfony\Component\HttpFoundation\Request;

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
    public function ajouter(): Response
    {
        return $this->render('cv/ajouter.html.twig', [
            'controller_name' => 'CvController',
        ]);
    }

    /**
     * @Route("/cv/modifier/{id}", name="cv-modifier")
     */
    // TODO : Créer un form CV
    /*
    public function modifier(Cv $cv, Request $request)
    {
        $form = $this->createForm(EditUserType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cv);
            $entityManager->flush();

            $this->addFlash('message', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('admin_utilisateurs');
        }

        return $this->render('admin/edituser.html.twig', [
            'userForm' => $form->createView(),
        ]);
    }
    */
}
