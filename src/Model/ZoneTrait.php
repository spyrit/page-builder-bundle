<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Model;

trait ZoneTrait
{
    public function getBlocks(): iterable
    {
        return [];
    }

    public function getEditorTemplate(): string
    {
        return '@SpyritPageBuilder/cms/_zone_editor.html.twig';
    }

    public function getTemplate(): string
    {
        return '@SpyritPageBuilder/cms/_zone.html.twig';
    }
}
