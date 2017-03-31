<?php

namespace OCUserBundle\Form;

use Doctrine\ORM\EntityRepository;
use OCUserBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MotoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numCadre')
            ->add('numMoteur')
            ->add('marque')
            ->add('cylindre')
//            ->add('user', EntityType::class, array(
//                "class" => User::class,
//                "query_builder" => function (EntityRepository $er) use ($options) {
//                    return $er->createQueryBuilder('u')
//                        ->orderBy('u.id')
//                        ->where('u.user = :user')
//                        ->setParameter('user', $options['user']);
//
//            }))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OCUserBundle\Entity\Moto',
            'user' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ocuserbundle_moto';
    }


}
