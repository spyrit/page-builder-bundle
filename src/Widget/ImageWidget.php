<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Widget;

use Spyrit\Bundle\SpyritPageBuilderBundle\Form\ImageWidgetType;
use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\BaseWidget;

class ImageWidget extends BaseWidget
{
    public function getFormType()
    {
        return ImageWidgetType::class;
    }

    public function getName()
    {
        return 'Bloc Image';
    }

    public function getDefaultConfiguration()
    {
        return [
            'classes' => '',
            'src' => '',
            'width' => '100',
            'height' => '100',
        ];
    }

    public function getTemplate()
    {
        return '@SpyritPageBuilder/render/image.html.twig';
    }
}
