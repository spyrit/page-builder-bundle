<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('zones', ChoiceType::class, [
                'label' => 'Disposition',
                'expanded' => true,
                'choices' => [
                    '1/1' => '12',
                    '3/4 + 1/4' => '9;3',
                    '1/4 + 3/4' => '3;9',
                    '2/3 + 1/3' => '8;4',
                    '1/3 + 2/3' => '4;8',
                    '1/2 + 1/2' => '6;6',
                    '1/4 + 1/2 + 1/4' => '3;6;3',
                    '3 × 1/3' => '4;4;4',
                    '4 × 1/4' => '3;3;3;3',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setRequired(['lines']);
        $resolver->setDefaults([
            'data_class' => null,
            'translation_domain' => false,
        ]);
    }
}
