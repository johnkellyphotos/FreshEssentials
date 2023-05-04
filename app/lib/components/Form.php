<?php

namespace lib\components;

use JetBrains\PhpStorm\Pure;
use src\App;

class Form extends App
{
    public const ACTION = 'action';
    public const ID = 'id';
    public const METHOD = 'method';

    #[Pure] public static function open(array $attributes = []): string
    {
        $attributeString = self::attributesToString($attributes);
        return "<form $attributeString>";
    }

    public static function close(): string
    {
        return "</form>";
    }

    private static function attributesToString(array $attributes): string
    {
        $attributes[self::ID] ??= 'form-' . uniqid();
        $attributes[self::METHOD] ??= 'POST';
        $attributeString = '';
        foreach ($attributes as $attribute => $value) {
            $attributeString .= "$attribute=\"$value\" ";
        }
        return $attributeString;
    }
}