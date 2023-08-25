<?php

namespace Codedor\SocialMediaLinks\Settings;

use Codedor\FilamentSettings\Rules\SettingMustBeFilledIn;
use Codedor\FilamentSettings\Settings\SettingsInterface;
use Filament\Forms\Components\TextInput;

class SocialMediaLinks implements SettingsInterface
{
    public static function schema(): array
    {
        return collect(config('filament-social-media-links.platforms', []))
            ->map(fn ($icon, $platform) => TextInput::make("filament-social-media-links.{$platform}"))
            ->toArray();
    }

    public static function priority(): int
    {
        return 40;
    }
}
