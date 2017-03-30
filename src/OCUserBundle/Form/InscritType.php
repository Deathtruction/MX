<?php

namespace OCUserBundle\Form;

use Doctrine\ORM\EntityRepository;
use OCUserBundle\Entity\Categorie;
use OCUserBundle\Entity\Moto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscritType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('moto', EntityType::class, array(
                "class" => Moto::class,
                "choice_label" => "numCadre",
                'query_builder' => function (EntityRepository $er) use ($options) {
            return $er ->createQueryBuilder('m')
                ->orderBy('m.numCadre', 'ASC')
                ->where('m.user = :user')
                ->setParameter('user', $options['user']);

                }
            ))

            ->add('categorie', EntityType::class, array(
                "class" => Categorie::class,
                "choice_label" => 'nom'
            ));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OCUserBundle\Entity\Inscrit',
            'user' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ocuserbundle_inscrit';
    }
}
