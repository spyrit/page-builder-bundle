<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Widget;

use Spyrit\Bundle\SpyritPageBuilderBundle\Form\BaseWidgetType;

abstract class BaseWidget
{
    public function decodeConfiguration(string $config)
    {
        return json_decode($config, true);
    }

    public function encodeConfiguration(array $config)
    {
        return json_encode($config);
    }

    public function getDefaultConfiguration()
    {
        return [];
    }

    public function getFormType()
    {
        return BaseWidgetType::class;
    }

    public function getName()
    {
        return 'widget';
    }

    public function getTemplate()
    {
        return '@SpyritPageBuilder/render/base.html.twig';
    }

    public function getEditorTemplate()
    {
        return $this->getTemplate();
    }
}