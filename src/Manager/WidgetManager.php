<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Manager;

use LogicException;
use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\BaseWidget;
use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\ButtonWidget;
use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\FillerWidget;
use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\ImageWidget;
use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\TextWidget;
use Spyrit\Bundle\SpyritPageBuilderBundle\Widget\Widget;

class WidgetManager
{
    public function getId(BaseWidget $widget): string
    {
        if ($widget instanceof ButtonWidget) {
            return Widget::BUTTON;
        }
        if ($widget instanceof FillerWidget) {
            return Widget::FILLER;
        }
        if ($widget instanceof ImageWidget) {
            return Widget::IMAGE;
        }
        if ($widget instanceof TextWidget) {
            return Widget::TEXT;
        }

        throw new LogicException('Unknown widget '.class_basename($widget).'. To implement your own widgets, extend the WidgetManager.');
    }

    public function instantiate(string $type): BaseWidget
    {
        switch ($type) {
            case Widget::BUTTON:
                return new ButtonWidget();
            case Widget::FILLER:
                return new FillerWidget();
            case Widget::IMAGE:
                return new ImageWidget();
            case Widget::TEXT:
                return new TextWidget();
            default:
                throw new LogicException('Unknown widget '.$type.'. To implement your own widgets, extend the WidgetManager.');
        }
    }
}
