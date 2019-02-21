<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Model;

use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\BaseWidget;

interface BlockInterface
{
    public function getConfiguration();

    public function getEditorTemplate();

    public function getTemplate();

    public function getWidget();

    public function setConfiguration(array $configuration);

    public function setWidget(BaseWidget $widget);
}