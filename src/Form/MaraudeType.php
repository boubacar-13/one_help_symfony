<?php

namespace App\Form;

use App\Entity\Maraude;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaraudeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresseMaraude')
            ->add('codePostalMaraude')
            ->add('dateMaraude')
            ->add('heureMaraude')
            ->add('villeMaraude')
            ->add('personne')
            ->add('benevoles');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Maraude::class,
        ]);
    }
}
