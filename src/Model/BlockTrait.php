<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Model;

use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\BaseWidget;
use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\Widget;

trait BlockTrait
{
    /*
     * It is suggested to use a Doctrine ENUM here.
     * You can use a class that will mimic Spyrit\Bundle\SpyritPageBuilderBundle\Widget\Widget
     */
    private $widget_id;

    public function getConfiguration(): array
    {
        $config = null; // get $config from your entity

        return $this->getWidget()->decodeConfiguration($config);
    }

    public function setConfiguration(array $config): self
    {
        $config = $this->getWidget()->encodeConfiguration($config);

        // store $config in your entity

        return $this;
    }

    public function getTemplate(): string
    {
        return '@SpyritPageBuilder/cms/_block.html.twig';
    }

    public function getEditorTemplate(): string
    {
        return '@SpyritPageBuilder/cms/_block_editor.html.twig';
    }

    public function getWidget(): BaseWidget
    {
        return Widget::instantiate($this->widget_id);
    }

    public function setWidget(BaseWidget $widget): self
    {
        $this->widget_id = Widget::getId($widget);

        return $this;
    }
}