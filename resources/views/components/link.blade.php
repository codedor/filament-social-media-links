<li
    {{
        $attributes->class([
            'social-media__element',
        ])
    }}
>
    <a class="social-media__link"
       target="_blank"
       rel="noopener noreferrer"
       data-category="{{ $category }}"
       data-action="hit"
       data-label="{{ $label }}"
       href="{{ $href }}"
    >
        @if ($showIcon)
            <i class="{{ $iconClass }}"></i>
        @else
            {{ $label }}
        @endif
    </a>
</li>
