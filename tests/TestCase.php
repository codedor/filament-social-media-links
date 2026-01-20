<?php

namespace Wotz\SocialMediaLinks\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Wotz\FilamentSettings\Providers\SettingsServiceProvider;
use Wotz\MediaLibrary\Providers\MediaLibraryServiceProvider;
use Wotz\SocialMediaLinks\Providers\SocialMediaLinksServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Wotz\\SocialMediaLinks\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            SocialMediaLinksServiceProvider::class,
            SettingsServiceProvider::class,
            MediaLibraryServiceProvider::class,
            LivewireServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-social-media-links_table.php.stub';
        $migration->up();
        */
    }
}
