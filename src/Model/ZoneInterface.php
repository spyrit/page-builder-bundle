<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Model;

interface ZoneInterface
{
    public function getEditorTemplate();

    public function getTemplate();

    public function getBlocks();
}