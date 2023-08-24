<?php

namespace Codedor\SocialMediaLinks\Tests;

use Codedor\FilamentSettings\Providers\SettingsServiceProvider;
use Codedor\MediaLibrary\Providers\MediaLibraryServiceProvider;
use Codedor\SocialMediaLinks\Providers\SocialMediaLinksServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Codedor\\Links\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
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
