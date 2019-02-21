<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Widget;

use Spyrit\Bundle\SpyritPageBuilderBundle\Form\TextWidgetType;

class TextWidget extends BaseWidget
{
    public function getDefaultConfiguration()
    {
        return [
            'classes' => '',
            'content' => '',
        ];
    }

    public function getFormType()
    {
        return TextWidgetType::class;
    }

    public function getName()
    {
        return 'Bloc texte';
    }

    public function getTemplate()
    {
        return '@SpyritPageBuilder/render/text.html.twig';
    }
}