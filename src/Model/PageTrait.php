<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Model;

use Spyrit\Bundle\SpyritPageBuilderBundle\Form\LineType;

trait PageTrait
{
    /*
     * It is suggested that zones should be a collection of Zone entities.
     */
    private $zones;

    public function getZones(): iterable
    {
        return $this->zones;
    }

    public function getLines(): iterable
    {
        $lines = [];
        foreach ($this->getZones() as $zone) {
            $line = $zone->getLine();
            if (isset($lines[$line])) {
                $lines[$line][] = $zone;
            } else {
                $lines[$line] = [$zone];
            }
        }

        return $lines;
    }

    public function getLineFormType(): string
    {
        return LineType::class;
    }

    public function getEditorTemplate(): string
    {
        return '@SpyritPageBuilder/cms/_page_editor.html.twig';
    }

    public function getLineEditorTemplate(): string
    {
        return '@SpyritPageBuilder/cms/_line_editor.html.twig';
    }

    public function getLineTemplate(): string
    {
        return '@SpyritPageBuilder/cms/_line.html.twig';
    }

    public function getTemplate(): string
    {
        return '@SpyritPageBuilder/cms/_page.html.twig';
    }
}
