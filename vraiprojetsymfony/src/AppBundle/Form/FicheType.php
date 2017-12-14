<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\projet;
class FicheType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('projet', EntityType::class, array(
                'label' => 'Veuillez choisir un projet',
                'class' => projet::class,
                'query_builder' => function (EntityRepository $er){
                    return $er->createQueryBuilder('p')
                        ->where('p.dateEnd >= :date')
                        ->setParameter('date', new \DateTime())
                        ;
                    return $er->getOpen;
            },
        ))
            ->add('manager')
            ->add('ficheDate')
            ->add('nbDayDone')
            ->add('nbDateSold')
            ->add('progression')
            ->add('comment');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Fiche'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_fiche';
    }


}
