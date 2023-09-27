<?php

namespace Codedor\SocialMediaLinks\Settings;

use Codedor\FilamentSettings\Settings\SettingsInterface;
use Codedor\LocaleCollection\Facades\LocaleCollection;
use Codedor\LocaleCollection\Locale;
use Codedor\MediaLibrary\Filament\AttachmentInput;

class LogoStructuredData implements SettingsInterface
{
    public static function schema(): array
    {
        return LocaleCollection::map(
            fn (Locale $locale) => AttachmentInput::make('filament-social-media-links.image_structured_data_' . $locale->locale() . '_id')
                ->label('Structured data image for ' . $locale->locale())
                ->allowedFormats(config('filament-social-media-links.formatter-formats', []))
        )
            ->toArray();
    }

    public static function priority(): int
    {
        return 45;
    }
}
