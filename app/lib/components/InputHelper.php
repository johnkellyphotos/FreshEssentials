<?php

namespace lib\components;

use Smarty;

trait InputHelper
{
    private static function addClass(array &$data, string $className): void
    {
        if (!isset($data[self::ATTRIBUTES][self::CLASSNAME])) {
            $data[self::ATTRIBUTES][self::CLASSNAME] = [
                'form-control',
                $className,
            ];
        } elseif (!is_array($data[self::ATTRIBUTES][self::CLASSNAME])) {
            $data[self::ATTRIBUTES][self::CLASSNAME] = [$data[self::ATTRIBUTES][self::CLASSNAME]];
            $data[self::ATTRIBUTES][self::CLASSNAME][] = 'form-control';
            $data[self::ATTRIBUTES][self::CLASSNAME][] = $className;
        } elseif (!in_array($className, $data[self::ATTRIBUTES][self::CLASSNAME])) {
            $data[self::ATTRIBUTES][self::CLASSNAME][] = $className;
        }
    }

    private static function _smarty($data = [], $inputType = 'input'): Smarty
    {
        $inputId = $inputType . '-' . uniqid();

        $smarty = new Smarty();
        $smarty->setTemplateDir(APP_VIEW_DIRECTORY);
        $smarty->setCompileDir(APP_PLUGIN_DIRECTORY . "smarty-4.3.1/compiled");
        $smarty->setConfigDir(APP_PLUGIN_DIRECTORY . "smarty-4.3.1/config");
        $smarty->setCacheDir(APP_PLUGIN_DIRECTORY . "smarty-4.3.1/template_cache");

        self::addClass($data, 'form-control');

        if (!empty($data[self::LABEL])) {
            $smarty->assign(self::LABEL, $data[self::LABEL]);
        }
        if (!empty($data[self::DESCRIPTION])) {
            $smarty->assign(self::DESCRIPTION, $data[self::DESCRIPTION]);
        }
        if (!empty($data[self::OPTIONS])) {
            $smarty->assign(self::OPTIONS, $data[self::OPTIONS]);
        }

        if (empty($data[self::ATTRIBUTES][self::NAME])) {
            $data[self::ATTRIBUTES][self::NAME] = $inputId;
        }

        if (isset($data[self::ATTRIBUTES]['id'])) {
            unset($data[self::ATTRIBUTES]['id']);
        }

        if (!empty($data[self::WRAPPER_CLASS])) {
            if (!is_array($data[self::WRAPPER_CLASS])) {
                $data[self::WRAPPER_CLASS] = [$data[self::WRAPPER_CLASS]];
            }
            $smarty->assign('wrapperClass', self::attributesToString($data[self::WRAPPER_CLASS]));
        }

        if (!empty($data[self::ATTRIBUTES])) {
            foreach ($data[self::ATTRIBUTES] as $key => $value) {
                if (!in_array($key, AllowedAttributesByInput::INPUT[$inputType])) {
                    unset($data[self::ATTRIBUTES][$key]);
                }
            }

            $smarty->assign(self::ATTRIBUTES, $data[self::ATTRIBUTES]);
            $smarty->assign('attributeString', self::attributesToString($data[self::ATTRIBUTES]));
        }

        $smarty->assign("id", $inputId);
        return $smarty;
    }

    private static function attributesToString(array $attributes): string
    {
        $attributeString = '';
        foreach ($attributes as $attributeName => $attributeValue) {
            if ($attributeName == self::CLASSNAME) {
                $attributeString .= " lib=\"" . implode(' ', $attributeValue) . "\" ";
                continue;
            }
            if ($attributeValue != (string)$attributeValue) {
                // throw error?
                continue;
            }
            $attributeString .= " " . htmlspecialchars($attributeName) . "=\"" . htmlspecialchars(
                    $attributeValue
                ) . "\" ";
        }
        return $attributeString;
    }
}