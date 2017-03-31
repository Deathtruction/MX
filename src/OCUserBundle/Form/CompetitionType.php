<?php

namespace OCUserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompetitionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, array(
                'widget' => 'single_text',
                'placeholder' => array(
                    'year' => 'Year',
                    'month' => 'Month',
                    'day' => 'Day'
                ),
            ))
            ->add('lieu')
            ->add('departement')
            ->add('club')
            ->add('correspondants')
            ->add('cylindreAccepter')
            ->add('type', ChoiceType::class, array(
                'choices' => array(
                    'Championnat' => 'type',
                    'Entrainement officiel' => 'type',
                    'Rencontre inter-club' => 'type'
                )
            ))
            ->add('dateLimiteInscription', DateType::class, array(
                'widget' => 'single_text',
                'placeholder' => array(
                    'year' => 'Year',
                    'month' => 'Month',
                    'day' => 'Day'
                )
            ))
            ->add('inscriptionOuverte', ChoiceType::class, array(
                'choices' => array(
                    'oui' => true,
                    'non' => false
                )
            ))
            ->add('nbParticipants');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OCUserBundle\Entity\Competition'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ocuserbundle_competition';
    }


}
