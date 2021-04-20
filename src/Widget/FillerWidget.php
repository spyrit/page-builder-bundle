<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Widget;

use Spyrit\Bundle\SpyritPageBuilderBundle\Form\FillerWidgetType;
use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\BaseWidget;

class FillerWidget extends BaseWidget
{
    public function getName()
    {
        return 'Bloc filler';
    }

    public function getFormType()
    {
        return FillerWidgetType::class;
    }

    public function getDefaultConfiguration()
    {
        return [
            'classes' => '',
            'margin' => '25',
        ];
    }

    public function getTemplate()
    {
        return '@SpyritPageBuilder/render/filler.html.twig';
    }
}
