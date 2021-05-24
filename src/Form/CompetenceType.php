<?php

namespace App\Form;

use App\Entity\Competence;
use App\Enum\NiveauMaitriseEnum;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompetenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // $builder->add('libelle')
        //     ->add('niveau_maitrise', ChoiceType::class, [
        //     'choices'  => [
        //         'Déutant' => 1,
        //         'Yes' => 2,
        //         'No' => 3,
        //     ],
        // ]);

        $builder->add('libelle')
            ->add('niveau_maitrise', ChoiceType::class, [
            'choices' => [
                NiveauMaitriseEnum::DEBUTANT => 1,
                NiveauMaitriseEnum::INTERMEDIAIRE => 2,
                NiveauMaitriseEnum::CONFIRME => 3,
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Competence::class,
        ]);
    }
}
