<?php

namespace lib\components;

use SmartyException;
use src\App;

class Input extends App
{
    use InputHelper;

    public const ATTRIBUTES = 'attributes';
    public const DESCRIPTION = 'description';
    public const LABEL = 'label';
    public const OPTIONS = 'options';
    public const WRAPPER_CLASS = 'wrapper-lib';

    /* input valid attributes */
    public const ACCEPT = 'accept';
    public const AUTOCOMPLETE = 'autocomplete';
    public const CLASSNAME = 'classname';
    public const DATA_API_URL = 'data-url';
    public const DATA_ATTR = 'data_attr';
    public const DATA_TRIGGER_EVENT = 'data_trigger_event';
    public const MAX = 'max';
    public const MIN = 'min';
    public const NAME = 'name';
    public const PLACEHOLDER = 'placeholder';
    public const REQUIRED = 'required';
    public const STYLE = 'style';
    public const VALUE = 'value';


    /* @throws SmartyException */
    public static function text(array $data = []): string
    {
        return self::_smarty($data, 'text')->fetch('components/text.tpl');
    }

    /* @throws SmartyException */
    public static function select(array $data = []): string
    {
        self::addClass($data, 'form-select');
        return self::_smarty($data, 'select')->fetch('components/select.tpl');
    }

    /* @throws SmartyException */
    public static function submit(array $data = []): string
    {
        return self::_smarty($data, 'submit')->fetch('components/submit.tpl');
    }
}