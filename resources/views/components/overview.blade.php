<ul
    {{
        $attributes->class([
            'social-media__list',
            'list-unstyled' => setting('filament-social-media-links.facebook'),
        ])
    }}
>
    @foreach ($platforms as $platform => $data)
        <x-social-media-links::item
            :label="$platform"
            category="Social"
            :href="$data['url']"
            :show-icon="$showIcon"
            :icon-class="$data['icon']"
        />
    @endforeach
</ul>

<script type="application/ld+json">
    {!! $structuredData !!}
</script>
