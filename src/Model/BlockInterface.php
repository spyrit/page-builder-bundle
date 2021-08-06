<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Model;

interface BlockInterface
{
    public function getConfiguration(): string;

    public function getEditorTemplate(): string;

    public function getTemplate(): string;

    public function getWidgetId();

    public function setConfiguration(string $configuration): self;

    public function setWidgetId($widget): self;
}
