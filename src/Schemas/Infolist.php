<?php

namespace LumiteStudios\FilamentHelpers\Schemas;

use Filament\Infolists;
use Filament\Support\Icons\Heroicon;

class Infolist
{
    public static function getDeletedAtEntry(): Infolists\Components\TextEntry
    {
        return Infolists\Components\TextEntry::make('deleted_at')
            ->hiddenLabel()
            ->badge()
            ->color('danger')
            ->icon(Heroicon::Trash)
            ->hidden(fn ($record): bool => $record->deleted_at === null)
            ->date()
            ->formatStateUsing(fn (): string => 'Record Deleted')
            ->tooltip(fn ($state) => $state);
    }

    public static function getMetadataEntry(): Infolists\Components\KeyValueEntry
    {
        return Infolists\Components\KeyValueEntry::make('metadata')
            ->label('Metadata');
    }

    public static function getSettingsEntry(): Infolists\Components\KeyValueEntry
    {
        return Infolists\Components\KeyValueEntry::make('settings')
            ->label('Settings')
            ->state(fn ($record) => $record->settings->forFilamentInfolist());
    }
}
