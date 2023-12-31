# Manage social media links in Flament

Package to manage social media links using our [Settings](https://github.com/codedor/filament-settings) package and display them in the front-end using blade components.

## Installation

You can install the package via composer:

```bash
composer require codedor/filament-social-media-links
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-social-media-links-config"
```

This is the contents of the published config file:

```php
return [
    'platforms' => [
        'facebook' => 'fab fa-facebook',
        'instagram' => 'fab fa-instagram',
        'twitter' => 'fab fa-twitter',
        'linkedIn' => 'fab fa-linkedin',
        'pinterest' => 'fab fa-pinterest',
        'youtube' => 'fab fa-youtube',
        'vimeo' => 'fab fa-vimeo',
        'github' => 'fab fa-github',
        'tripAdvisor' => 'fab fa-tripadvisor',
        'skype' => 'fab fa-skype',
        'tiktok' => 'fab fa-tiktok',
    ],
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-social-media-links-views"
```

## Usage

```php
<x-social-media-links::overview />
```

## Documentation

For the full documentation, check [here](./docs/index.md).

## Testing

```bash
vendor/bin/pest
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Upgrading

Please see [UPGRADING](UPGRADING.md) for more information on how to upgrade to a new version.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you discover any security-related issues, please email info@codedor.be instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
