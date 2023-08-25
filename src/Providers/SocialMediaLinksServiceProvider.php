<?php

namespace Codedor\SocialMediaLinks\Providers;

use Codedor\FilamentSettings\Repositories\SettingTabRepository;
use Codedor\SocialMediaLinks\Settings\LogoStructuredData;
use Codedor\SocialMediaLinks\Settings\SocialMediaLinks;
use Codedor\SocialMediaLinks\Views\Components\Link;
use Codedor\SocialMediaLinks\Views\Components\Links;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SocialMediaLinksServiceProvider extends PackageServiceProvider
{
    protected const PACKAGE_NAME = 'filament-social-media-links';

    protected array $bladeComponents = [
        'links' => Links::class,
        'link' => Link::class,
    ];

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
            Links::class => 'filament-social-media-links::overview',
            Link::class => 'filament-social-media-links::item',
        ]);
    }
}
