<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Entity\Utilisateur;
use App\Repository\CvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AjouterCvType;
use App\Form\ModifierCvType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Security;
use \Symfony\Component\Form\SubmitButton;

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
}
