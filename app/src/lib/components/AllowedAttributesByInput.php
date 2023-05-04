<?php

namespace lib\components;

use src\App;

class AllowedAttributesByInput extends App
{
    public const INPUT = [
        'text' => [
            Input::AUTOCOMPLETE,
            Input::CLASSNAME,
            Input::DATA_API_URL,
            Input::DATA_ATTR,
            Input::DATA_TRIGGER_EVENT,
            Input::NAME,
            Input::PLACEHOLDER,
            Input::REQUIRED,
            Input::STYLE,
            Input::VALUE,
        ],
        'select' => [
            Input::AUTOCOMPLETE,
            Input::CLASSNAME,
            Input::DATA_API_URL,
            Input::DATA_ATTR,
            Input::DATA_TRIGGER_EVENT,
            Input::NAME,
            Input::PLACEHOLDER,
            Input::REQUIRED,
            Input::STYLE,
            Input::VALUE,
        ],
        'file' => [
            Input::ACCEPT,
            Input::CLASSNAME,
            Input::DATA_API_URL,
            Input::DATA_ATTR,
            Input::DATA_TRIGGER_EVENT,
            Input::NAME,
            Input::REQUIRED,
            Input::STYLE,
        ],
        'submit' => [
            Input::CLASSNAME,
            Input::DATA_API_URL,
            Input::DATA_ATTR,
            Input::DATA_TRIGGER_EVENT,
            Input::NAME,
            Input::STYLE,
            Input::VALUE,
        ],
    ];
}