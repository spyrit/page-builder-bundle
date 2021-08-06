<?php

namespace Spyrit\Bundle\SpyritPageBuilderBundle\Widget;

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
}
