<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Model;

use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\Widget;

trait BlockTrait
{
    /*
     * It is suggested to use a Doctrine ENUM here.
     * You can use a class that will mimic Spyrit\Bundle\SpyritPageBuilderBundle\Widget\Widget
     */
    private $widget_id;

    /*
     * It is suggested to store this as encoded JSON in a database.
     * Encoding/decoding should be performed by the Widget itself.
     */
    private $configuration = '';

    public function getConfiguration(): string
    {
        return $this->configuration;
    }

    public function setConfiguration(string $configuration): self
    {
        $this->configuration = $configuration;

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

    public function getWidgetId()
    {
        return $this->widget_id;
    }

    public function setWidget($widgetId): self
    {
        $this->widget_id = $widgetId;

        return $this;
    }
}
