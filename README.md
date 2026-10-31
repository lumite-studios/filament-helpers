# lumite-studios/filament-settings-page

```bash
composer require lumite-studios/filament-settings-page
```

## Usage
```php
use LumiteStudios\FilamentSettingsPage\SettingsPage;
use Filament\Schemas\Schema;

class General extends SettingsPage
{
    protected function fillForm(): void
    {
        $settings = Setting::all();

        $this->form->fill($settings->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema;
    }

    public function save(): void
    {
        if (! $this->canEdit()) {
            return;
        }

        // handle saving
    }
}
```
