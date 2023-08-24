<?php

namespace Codedor\SocialMediaLinks\Providers;

use Codedor\SocialMediaLinks\Views\Components\Link;
use Codedor\SocialMediaLinks\Views\Components\Links;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SocialMediaLinksServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-social-media-links')
            ->setBasePath(__DIR__ . '/../')
            ->hasConfigFile()
            ->hasViewComponents(
                'filament-social-media-links::',
                Links::class,
                Link::class,
            )
            ->hasViews();
    }

    public function packageBooted()
    {
        parent::packageBooted();

        // Register Filament settings tab
    }
}
