<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Widget;

use Spyrit\Bundle\SpyritPageBuilderBundle\Form\ButtonWidgetType;

class ButtonWidget extends BaseWidget
{
    public function getTemplate()
    {
        return '@SpyritPageBuilder/render/button.html.twig';
    }

    public function getFormType()
    {
        return ButtonWidgetType::class;
    }

    public function getName()
    {
        return 'Button block';
    }

    public function getDefaultConfiguration()
    {
        return [
            'classes' => '',
            'target' => '_self',
            'title' => 'Button',
            'url' => '#',
        ];
    }
}