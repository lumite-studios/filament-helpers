<?php

namespace LumiteStudios\FilamentHelpers\Schemas;

use Filament\Tables;
use Illuminate\Support\Str;

class Table
{
    public static function getCreatedAtColumn(string $label = 'Created'): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('created_at')
            ->label($label)
            ->dateTime();
    }

    public static function getEmailColumn(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('email')
            ->label('Email')
            ->formatStateUsing(fn ($state): string => Str::replaceMatches('/(?!^).(?=[^@]+@)/', fn ($matches) => '*', $state));
    }

    public static function getUpdatedAtColumn(string $label = 'Updated'): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('updated_at')
            ->label($label)
            ->dateTime();
    }
}
