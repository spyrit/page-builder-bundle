<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Widget;

use Spyrit\Bundle\SpyritPageBuilderBundle\Form\ImageWidgetType;

class ImageWidget extends BaseWidget
{
    public function getFormType(): string
    {
        return ImageWidgetType::class;
    }

    public function getName(): string
    {
        return 'Bloc Image';
    }

    public function getDefaultConfiguration(): array
    {
        return [
            'classes' => '',
            'src' => '',
            'width' => '100',
            'height' => '100',
        ];
    }

    public function getTemplate(): string
    {
        return '@SpyritPageBuilder/render/image.html.twig';
    }
}
