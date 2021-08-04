<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Widget;

use LogicException;

class Widget
{
    const BUTTON = 'Button';
    const FILLER = 'Filler';
    const IMAGE = 'Image';
    const TEXT = 'Text';

    const CHOICES = [
        'Button' => self::BUTTON,
        'Horizontal line' => self::FILLER,
        'Image' => self::IMAGE,
        'Text' => self::TEXT,
    ];

    public static function getId(BaseWidget $widget)
    {
        if ($widget instanceof ButtonWidget) {
            return self::BUTTON;
        }
        if ($widget instanceof FillerWidget) {
            return self::FILLER;
        }
        if ($widget instanceof ImageWidget) {
            return self::IMAGE;
        }
        if ($widget instanceof TextWidget) {
            return self::TEXT;
        }

        throw new LogicException();
    }

    public static function instantiate(string $type)
    {
        switch ($type) {
            case self::BUTTON:
                return new ButtonWidget();
            case self::FILLER:
                return new FillerWidget();
            case self::IMAGE:
                return new ImageWidget();
            case self::TEXT:
                return new TextWidget();
            default:
                throw new LogicException();
        }
    }
}
