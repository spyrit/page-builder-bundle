<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Model;

use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\BaseWidget;

interface BlockInterface
{
    public function getConfiguration(): array;

    public function getEditorTemplate(): string;

    public function getTemplate(): string;

    public function getWidget(): BaseWidget;

    public function setConfiguration(array $configuration): self;

    public function setWidget(BaseWidget $widget): self;
}