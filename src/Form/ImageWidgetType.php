<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ImageWidgetType extends BaseWidgetType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('src', TextType::class, [
                'label' => 'Source',
            ])
            ->add('width', IntegerType::class, [
                'label' => 'Width',
            ])
            ->add('height', IntegerType::class, [
                'label' => 'Height',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
