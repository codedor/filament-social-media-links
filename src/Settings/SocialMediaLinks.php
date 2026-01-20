<?php

namespace Wotz\SocialMediaLinks\Settings;

use Wotz\FilamentSettings\Settings\SettingsInterface;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;

class SocialMediaLinks implements SettingsInterface
{
    public static function schema(): array
    {
        return collect(config('filament-social-media-links.platforms', []))
            ->map(
                fn ($icon, $platform) => TextInput::make("filament-social-media-links.{$platform}")
                    ->label(Str::headline($platform))
            )
            ->toArray();
    }

    public static function priority(): int
    {
        return 40;
    }

    public static function title(): string
    {
        return __('filament-social-media-links::settings.social media links');
    }
}
