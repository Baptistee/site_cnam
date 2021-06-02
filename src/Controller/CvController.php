<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Entity\Utilisateur;
use App\Entity\Competence;
use App\Repository\CvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CvType;
use App\Form\CompetenceType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
    public function community()
    {
        return $this->render("cv/community.html.twig", [
            'cvs' => $this->getDoctrine()
                ->getRepository(Cv::class)
                ->findby(['public' => 1])
        ]);
    }
    
    
    /**
     * @IsGranted("ROLE_USER")
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
     * @IsGranted("ROLE_USER")
     * @Route("/cv/ajouter", name="cv-ajouter")
     */
    public function ajouter(Request $request, ObjectManager $manager)
    {
        $cv = new Cv();

        $form = $this->createForm(CvType::class, $cv);

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
     * @IsGranted("ROLE_USER")
     * @Route("/cv/modifier", name="cv-modifier")
     */
    public function modifier(Request $request)
    {
        $utilisateur = $this->getDoctrine()
                ->getRepository(Utilisateur::class)
                ->find($this->security->getUser());

        $form = $this->createForm(CvType::class, $utilisateur->getCv());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cv');
        }

        return $this->render('cv/modifier.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @IsGranted("ROLE_USER")
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
     * @IsGranted("ROLE_USER")
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
     * @IsGranted("ROLE_USER")
     * @Route("/cv/competence/ajouter", name="competence-ajouter")
     */
    public function ajouterCompetence(Request $request, ObjectManager $manager)
    {
        $competence = new Competence();

        $form = $this->createForm(CompetenceType::class, $competence);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $utilisateur = $this->getDoctrine()
                ->getRepository(Utilisateur::class)
                ->find($this->security->getUser());
            $cv = $utilisateur->getCv();

            $cv->addCompetence($competence);
            $manager->persist($cv);
            $manager->flush();

            return $this->redirectToRoute('competences');
        }

        return $this->render('cv/competence/ajouter.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/cv/modifier/{id}", name="competence-modifier")
     */
    public function modifierCompetence(Competence $competence, Request $request)
    {
        $form = $this->createForm(CompetenceType::class, $competence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($competence);
            $entityManager->flush();

            return $this->redirectToRoute('competences');
        }
        
        return $this->render('cv/competence/modifier.html.twig', [
            'form' => $form->createView(), 'competence' => $competence
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/cv/competence/supprimer/{id}", name="competence-supprimer")
     */
    public function supprimerCompetence(Competence $competence)
    {
        $utilisateur = $this->getDoctrine()
                ->getRepository(Utilisateur::class)
                ->find($this->security->getUser());

        $cv = $utilisateur->getCv();
        $cv->removeCompetence($competence);

        $em = $this->getDoctrine()->getManager();
        $em->persist($cv); // pas besoin de persist avec le lien bdd ?
        $em->flush();
    
        $em->remove($competence);
        $em->flush();

        return $this->redirectToRoute('competences');
    }
}
