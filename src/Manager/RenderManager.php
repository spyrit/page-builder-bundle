<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Manager;

use Spyrit\Bundle\SpyritPageBuilderBundle\Model\BlockInterface;
use Spyrit\Bundle\SpyritPageBuilderBundle\Model\PageInterface;
use Spyrit\Bundle\SpyritPageBuilderBundle\Model\ZoneInterface;
use Twig\Environment;

class RenderManager
{
    private $templating;

    public function __construct(Environment $templating)
    {
        $this->templating = $templating;
    }

    public function renderPage(PageInterface $page, $editor = false): string
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

    public function renderBlock(BlockInterface $block, $editor = false): string
    {
        $content = $this->renderWidget($block, $editor);

        $template = $editor ? $block->getEditorTemplate() : $block->getTemplate();

        return $this->templating->render($template, [
            'block' => $block,
            'content' => $content,
        ]);
    }

    public function renderWidget(BlockInterface $block, $editor = false): string
    {
        $widget = $block->getWidget();
        $parameters = array_merge($widget->getDefaultConfiguration(), $block->getConfiguration());
        $parameters['block'] = $block;
        $parameters['widget'] = $widget;

        $template = $editor ? $widget->getEditorTemplate() : $widget->getTemplate();

        return $this->templating->render($template, $parameters);
    }

    public function renderZone(ZoneInterface $zone, $editor = false): string
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