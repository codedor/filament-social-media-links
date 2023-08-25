<?php

namespace Codedor\SocialMediaLinks\Providers;

use Codedor\FilamentSettings\Repositories\SettingTabRepository;
use Codedor\SocialMediaLinks\Settings\LogoStructuredData;
use Codedor\SocialMediaLinks\Settings\SocialMediaLinks;
use Codedor\SocialMediaLinks\Views\Components\Item;
use Codedor\SocialMediaLinks\Views\Components\Overview;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SocialMediaLinksServiceProvider extends PackageServiceProvider
{
    protected const PACKAGE_NAME = 'filament-social-media-links';

    public function configurePackage(Package $package): void
    {
        $package
            ->name($this->packageName())
            ->setBasePath(__DIR__ . '/../')
            ->hasConfigFile()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

        $this->registerBladeComponents();

        app(SettingTabRepository::class)
            ->registerTab([
                SocialMediaLinks::class,
                LogoStructuredData::class,
            ]);
    }

    public function packageName(): string
    {
        return self::PACKAGE_NAME;
    }

    protected function registerBladeComponents()
    {
        Blade::components([
            Overview::class => 'social-media-links::overview',
            Item::class => 'social-media-links::item',
        ]);
    }
}
