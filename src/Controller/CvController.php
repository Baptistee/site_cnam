<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Entity\Utilisateur;
use App\Entity\Competence;
use App\Repository\CvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AjouterCvType;
use App\Form\ModifierCvType;
use App\Form\AjouterCompetenceType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Security;

class CvController extends AbstractController
{
    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
       $this->security = $security;
    }

    /**
     * @Route("/cv/community", name="cv-community")
     */
    public function community(CvRepository $cv)
    {
        return $this->render("cv/community.html.twig", [
            'cvs' => $cv->findAll()
        ]);
    }
    
    
    /**
     * @Route("/cv", name="cv")
     */
    public function indexCv()
    {
        return $this->render("cv/index.html.twig", [
            'cv' => $this->getDoctrine()
                ->getRepository(Utilisateur::class)
                ->find($this->security->getUser())
                ->getCv()
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

        if($form->isSubmitted() && $form->isValid())
        {
            $cv->setUtilisateur($this->security->getUser());
            $manager->persist($cv);
            $manager->flush();

            $utilisateur = $this->getDoctrine()
                ->getRepository(Utilisateur::class)
                ->find($this->security->getUser());
            $utilisateur->setCv($cv);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($utilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('cv');
        }

        return $this->render('cv/ajouter.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/cv/modifier", name="cv-modifier")
     */
    public function modifier(Request $request)
    {
        $utilisateur = $this->getDoctrine()
                ->getRepository(Utilisateur::class)
                ->find($this->security->getUser());

        $form = $this->createForm(ModifierCvType::class, $utilisateur->getCv());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('cv/modifier.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/cv/supprimer", name="cv-supprimer")
     */
    public function supprimer()
    {
        $utilisateur = $this->getDoctrine()
                ->getRepository(Utilisateur::class)
                ->find($this->security->getUser());

        $cv = $utilisateur->getCv();
        $utilisateur->setCv(new Cv());

        $em = $this->getDoctrine()->getManager();
        $em->persist($utilisateur);
        $em->flush();
    
        $em->remove($cv);
        $em->flush();

        return $this->redirectToRoute('cv');
    }

    /**
     * @Route("/cv/competence", name="competences")
     */
    public function indexCompetences()
    {
        return $this->render("cv/competence/index.html.twig", [
            'competences' => $this->getDoctrine()
                ->getRepository(Utilisateur::class)
                ->find($this->security->getUser())
                ->getCv()
                ->getCompetences()
        ]);
    }

    /**
     * @Route("/cv/competence/ajouter", name="competence-ajouter")
     */
    public function ajouterCompetence(Request $request, ObjectManager $manager)
    {
        $competence = new Competence();

        $form = $this->createForm(AjouterCompetenceType::class, $competence);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $utilisateur = $this->getDoctrine()
                ->getRepository(Utilisateur::class)
                ->find($this->security->getUser());
            $cv = $utilisateur->getCv();
            // $competence->setCv($cv);
            // $manager->persist($competence);
            // $manager->flush();

            $cv->addCompetence($competence);
            // $entityManager = $this->getDoctrine()->getManager();
            $manager->persist($cv);
            $manager->flush();

            return $this->redirectToRoute('competences');
        }

        return $this->render('cv/competence/ajouter.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/cv/modifier/{id}", name="competence-modifier")
     */
    public function modifierCompetence(Request $request)
    {
        return $this->redirectToRoute('cv');
    }
}
