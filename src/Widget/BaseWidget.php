<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Widget;

use Spyrit\Bundle\SpyritPageBuilderBundle\Form\BaseWidgetType;

abstract class BaseWidget
{
    public function decodeConfiguration(string $config): array
    {
        return json_decode($config, true);
    }

    public function encodeConfiguration(array $config): string
    {
        return json_encode($config);
    }

    public function getDefaultConfiguration(): array
    {
        return [];
    }

    public function getFormType(): string
    {
        return BaseWidgetType::class;
    }

    public function getName(): string
    {
        return 'widget';
    }

    public function getTemplate(): string
    {
        return '@SpyritPageBuilder/render/base.html.twig';
    }

    public function getEditorTemplate(): string
    {
        return $this->getTemplate();
    }
}
