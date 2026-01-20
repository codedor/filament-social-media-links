<?php

namespace Wotz\SocialMediaLinks\Settings;

use Wotz\FilamentSettings\Settings\SettingsInterface;
use Wotz\LocaleCollection\Facades\LocaleCollection;
use Wotz\LocaleCollection\Locale;
use Wotz\MediaLibrary\Filament\AttachmentInput;

class LogoStructuredData implements SettingsInterface
{
    public static function schema(): array
    {
        return LocaleCollection::map(
            fn (Locale $locale) => AttachmentInput::make('filament-social-media-links.image_structured_data_' . $locale->locale() . '_id')
                ->label('Structured data image for ' . $locale->locale())
                ->label(__('filament-social-media-links::settings.logo structured data image :locale', [
                    'locale' => $locale->locale(),
                ]))
                ->allowedFormats(config('filament-social-media-links.formatter-formats', []))
        )
            ->toArray();
    }

    public static function priority(): int
    {
        return 45;
    }

    public static function title(): string
    {
        return __('filament-social-media-links::settings.logo structured data');
    }
}
