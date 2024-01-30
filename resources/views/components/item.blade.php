<li
    {{ $attributes->merge(['class' => 'social-media__element']) }}
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
            <i aria-hidden="true" class="{{ $iconClass }}"></i>
            <span class="visually-hidden">{{ $label }}</span>
        @else
            {{ $label }}
        @endif
    </a>
</li>
