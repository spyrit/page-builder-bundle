<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Model;

interface ZoneInterface
{
    public function getEditorTemplate(): string;

    public function getTemplate(): string;

    public function getBlocks(): iterable;
}