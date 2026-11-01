<?php

namespace LumiteStudios\FilamentHelpers\Schemas;

use Filament\Tables;
use Illuminate\Support\Str;

class Table
{
    public static function getEmailColumn(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('email')
            ->label('Email')
            ->formatStateUsing(fn ($state): string => Str::replaceMatches('/(?!^).(?=[^@]+@)/', fn ($matches) => '*', $state));
    }
}
