<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Manager;

use Spyrit\Bundle\SpyritPageBuilderBundle\Model\BlockInterface;
use Spyrit\Bundle\SpyritPageBuilderBundle\Model\PageInterface;
use Spyrit\Bundle\SpyritPageBuilderBundle\Model\ZoneInterface;
use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\BaseWidget;

class RenderManager
{
    private $templating;

    public function __construct(\Twig_Environment $templating)
    {
        $this->templating = $templating;
    }

    public function renderPage(PageInterface $page, $editor = false)
    {
        $content = '';
        $lines = $page->getLines();

        $lineTemplate = $editor ? $page->getLineEditorTemplate() : $page->getLineTemplate();

        foreach ($lines as $zones) {
            $lineContent = '';
            foreach ($zones as $zone) {
                $lineContent .= $this->renderZone($zone, $editor);
            }
            $content .= $this->templating->render($lineTemplate, [
                'content' => $lineContent,
                'zones' => $zones,
            ]);
        }

        $template = $editor ? $page->getEditorTemplate() : $page->getTemplate();

        return $this->templating->render($template, [
            'content' => $content,
            'page' => $page,
        ]);
    }

    public function renderBlock(BlockInterface $block, $editor = false)
    {
        $content = $this->renderWidget($block->getWidget(), $block->getConfiguration(), $editor);

        $template = $editor ? $block->getEditorTemplate() : $block->getTemplate();

        return $this->templating->render($template, [
            'block' => $block,
            'content' => $content,
        ]);
    }

    public function renderWidget(BaseWidget $widget, $config, $editor = false)
    {
        $parameters = array_merge($widget->getDefaultConfiguration(), $config);
        $parameters['widget'] = $widget;

        $template = $editor ? $widget->getEditorTemplate() : $widget->getTemplate();

        return $this->templating->render($template, $parameters);
    }

    public function renderZone(ZoneInterface $zone, $editor = false)
    {
        $content = '';
        foreach ($zone->getBlocks() as $block) {
            $content .= $this->renderBlock($block, $editor);
        }

        $template = $editor ? $zone->getEditorTemplate() : $zone->getTemplate();

        return $this->templating->render($template, [
            'content' => $content,
            'zone' => $zone,
        ]);
    }
}