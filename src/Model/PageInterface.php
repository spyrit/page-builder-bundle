<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Model;

interface PageInterface
{
    public function getEditorTemplate(): string;

    public function getLineEditorTemplate(): string;

    public function getLineTemplate(): string;

    public function getLines(): iterable;

    public function getLineFormType(): string;

    public function getTemplate(): string;

    public function getZones(): iterable;
}
