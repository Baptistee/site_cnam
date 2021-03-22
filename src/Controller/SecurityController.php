<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Utilisateur;
use App\Form\RegistrationType;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration()
    {
        $user = new Utilisateur();
        $form = $this->createForm(RegistrationType::class, $user);

        return $this->render('security/registration.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
