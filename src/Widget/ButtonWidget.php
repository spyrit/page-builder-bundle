<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Widget;

use Spyrit\Bundle\SpyritPageBuilderBundle\Form\ButtonWidgetType;

class ButtonWidget extends BaseWidget
{
    public function getTemplate(): string
    {
        return '@SpyritPageBuilder/render/button.html.twig';
    }

    public function getFormType(): string
    {
        return ButtonWidgetType::class;
    }

    public function getName(): string
    {
        return 'Button block';
    }

    public function getDefaultConfiguration(): array
    {
        return [
            'classes' => '',
            'target' => '_self',
            'title' => 'Button',
            'url' => '#',
        ];
    }
}
