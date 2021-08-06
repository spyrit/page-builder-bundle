<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Widget;

use Spyrit\Bundle\SpyritPageBuilderBundle\Form\FillerWidgetType;

class FillerWidget extends BaseWidget
{
    public function getName(): string
    {
        return 'Bloc filler';
    }

    public function getFormType(): string
    {
        return FillerWidgetType::class;
    }

    public function getDefaultConfiguration(): array
    {
        return [
            'classes' => '',
            'margin' => '25',
        ];
    }

    public function getTemplate(): string
    {
        return '@SpyritPageBuilder/render/filler.html.twig';
    }
}
