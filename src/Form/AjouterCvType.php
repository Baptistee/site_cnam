<?php

namespace App\Form;

use App\Entity\Cv;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjouterCvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('adresse')
            ->add('telephone')
            ->add('date_anniversaire')
            ->add('lien_site')
            ->add('bio')
            ->add('utilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cv::class,
        ]);
    }
}
