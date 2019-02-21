<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Model;

interface PageInterface
{
    public function getEditorTemplate();

    public function getLineEditorTemplate();

    public function getLineTemplate();

    public function getLines();

    public function getLineFormType();

    public function getTemplate();

    public function getZones();
}