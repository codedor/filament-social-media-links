<?php

use Codedor\FilamentSettings\Facades\Setting;
use Codedor\SocialMediaLinks\Views\Components\Overview;

it('can render the links component when no social platforms are set', function () {
    config(['filament-social-media-links.platforms' => []]);

    Setting::shouldReceive('get')
        ->once()
        ->with('filament-social-media-links.facebook', null)
        ->andReturn(null);

    Setting::shouldReceive('get')
        ->once()
        ->with('filament-social-media-links.image_structured_data_en_id', null)
        ->andReturn(null);

    Setting::shouldReceive('get')
        ->once()
        ->with('site.name', null)
        ->andReturn(null);

    $this->component(Overview::class)
        ->assertDontSee('<li>');
});

it('can render the links component', function (string $platform, string $url, string $icon) {
    config(['filament-social-media-links.platforms' => [
        $platform => $icon,
    ]]);

    Setting::shouldReceive('get')
        ->twice()
        ->with("filament-social-media-links.{$platform}", null)
        ->andReturn($url);

    Setting::shouldReceive('get')
        ->once()
        ->with('filament-social-media-links.facebook', null)
        ->andReturn($platform === 'facebook' ? $url : null);

    Setting::shouldReceive('get')
        ->once()
        ->with('filament-social-media-links.image_structured_data_en_id', null)
        ->andReturn(null);

    Setting::shouldReceive('get')
        ->once()
        ->with('site.name', null)
        ->andReturn(null);

    $this->component(Overview::class)
        ->assertSee($url)
        ->assertDontSee($icon);
})->with('platforms');

it('can render the links component with icons', function (string $platform, string $url, string $icon) {
    config(['filament-social-media-links.platforms' => [
        $platform => $icon,
    ]]);

    Setting::shouldReceive('get')
        ->twice()
        ->with("filament-social-media-links.{$platform}", null)
        ->andReturn($url);

    Setting::shouldReceive('get')
        ->once()
        ->with('filament-social-media-links.facebook', null)
        ->andReturn($platform === 'facebook' ? $url : null);

    Setting::shouldReceive('get')
        ->once()
        ->with('filament-social-media-links.image_structured_data_en_id', null)
        ->andReturn(null);

    Setting::shouldReceive('get')
        ->once()
        ->with('site.name', null)
        ->andReturn(null);

    $this->blade('<x-social-media-links::overview show-icon />')
        ->assertSee($url)
        ->assertSee($icon);
})->with('platforms');

it('can create structured data', function () {
    $component = new Overview;

    expect($component->structuredData())
        ->toBeJson(json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'url' => 'http://localhost',
            'logo' => '',
            'name' => '',
        ]));
});

it('can create platforms when no social platforms are set', function () {
    $component = new Overview;

    expect($component->platforms())
        ->toHaveCount(0);
});

it('can create platforms', function (string $platform, string $url, string $icon) {
    config(['filament-social-media-links.platforms' => [
        $platform => $icon,
    ]]);

    Setting::shouldReceive('get')
        ->twice()
        ->with("filament-social-media-links.{$platform}", null)
        ->andReturn($url);

    $component = new Overview;

    expect($component->platforms()->toArray())
        ->toEqual([
            $platform => [
                'url' => $url,
                'icon' => $icon,
            ],
        ]);
})->with('platforms');
