<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 22/02/2017
 * Time: 17:51
 */

namespace AppBundle\Form;

use AppBundle\Entity\Video;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('danseId', EntityType::class, array(
            'class' => 'AppBundle\Entity\Danse',
            'choice_label' => 'nameDanse',
            'expanded' => false,
            'multiple' =>  false,
            'label' => false,
            'attr' => array(
                'class' => "form-control"
            ),
        ))
            ->add('titleVideo', TextType::class, array(
                'required' => true,
                'trim' => true,
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Titre',
                    'class' => "form-control"
                ),
            ))
            ->add('nameVideo', FileType::class, array(
                'required' => true,
                'label' => false,
                'data_class' => null,
                'attr' => array(
                    'class' => "form-control"
                ),
            ))
            ->add('celebrity', EntityType::class, array(
                'class' => 'AppBundle\Entity\Celebrity',
                'choice_label' => 'firstNameCelebrity',
                'required' => true,
                'label' => false,
                'expanded' => false,
                'multiple' =>  true,
                'attr' => array(
                    'class' => "chosen-select chosen-rtl",
                    'data-placeholder' => "Choose a star"
                ),
            ))
            ->add('likeVideo', NumberType::class, array(
                'required' => true,
                'trim' => true,
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Nb Like',
                    'class' => "form-control"
                ),
            ))
            ->add('saison', EntityType::class, array(
                'class' => 'AppBundle\Entity\Saison',
                'choice_label' => 'nameSaison',
                'expanded' => false,
                'multiple' =>  false,
                'label' => false,
                'attr' => array(
                    'class' => "form-control"
                ),

            ));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Video'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }
}