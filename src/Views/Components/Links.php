<?php

namespace Codedor\SocialMediaLinks\Views\Components;

use Codedor\MediaLibrary\Models\Attachment;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Links extends Component
{
    public function __construct(
        public bool $showIcon = false
    ) {
    }

    public function platforms(): Collection
    {
        return collect(config('filament-social-media-links.platforms', []))
            ->filter(fn ($icon, $platform) => setting('filament-social-media-links.' . $platform))
            ->mapWithKeys(function ($icon, $platform) {
                $url = setting('filament-social-media-links.' . $platform);

                return [
                    $platform => [
                        'url' => $url,
                        'icon' => config("filament-social-media-links.platforms.{$platform}"),
                    ],
                ];
            });
    }

    public function structuredData()
    {
        $locale = strtolower(app()->getLocale());
        $image = Attachment::find(setting('filament-social-media-links.image_structured_data_' . $locale . '_id'));

        return json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'url' => url('/'),
            'logo' => $image->url ?? '',
            'name' => setting('site.name', ''),
        ]);
    }

    public function render(): View
    {
        return $this->view('filament-social-media-links::components.links');
    }
}
