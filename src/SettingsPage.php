<?php

namespace LumiteStudios\FilamentSettingsPage;

use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

abstract class SettingsPage extends Page
{
    abstract protected function fillForm(): void;

    abstract public function form(Schema $schema): Schema;

    abstract public function save(): void;

    public ?array $data = [];

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    public function mount(): void
    {
        $this->fillForm();
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components(
                Form::make([EmbeddedSchema::make('form')])
                    ->id('form')
                    ->footer([
                        $this->getFormActions(),
                    ])
            );
    }

    public function getFormActions(): Actions
    {
        return Actions::make([
            $this->getSaveFormAction(),
        ]);
    }

    public function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label('Save Changes')
            ->action(fn () => $this->save())
            ->visible($this->canEdit());
    }

    public function defaultForm(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->disabled(! $this->canEdit())
            ->statePath('data');
    }

    public function canEdit(): bool
    {
        return true;
    }
}
