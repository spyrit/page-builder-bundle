<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Widget;

use Spyrit\Bundle\SpyritPageBuilderBundle\Form\TextWidgetType;

class TextWidget extends BaseWidget
{
    public function getDefaultConfiguration(): array
    {
        return [
            'classes' => '',
            'content' => '',
        ];
    }

    public function getFormType(): string
    {
        return TextWidgetType::class;
    }

    public function getName(): string
    {
        return 'Text block';
    }

    public function getTemplate(): string
    {
        return '@SpyritPageBuilder/render/text.html.twig';
    }
}
