@props([
    'variant' => 'primary',
    'icon' => null,
    'class' => '',
    'href' => ''
])

@php
    $classes = trim(implode(' ', array_filter([
        'btn',
        'btn-' . $variant,
        $class
    ])));
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    @if ($icon)
        <i class="bi bi-{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>
