<?php

namespace LumiteStudios\FilamentHelpers\Schemas;

use Filament\Forms;

class Form
{
    public static function getSettingsField(string $name = 'settings', string $label = 'Settings')
    {
        return Forms\Components\KeyValue::make($name)
            ->label($label)
            ->addable(false)
            ->deletable(false)
            ->editableKeys(false);
    }
}
