@props([
    'variant' => 'primary',
    'icon' => null,
    'pill' => false
])

@php
    $classes = trim(implode(' ', array_filter([
        'badge',
        'text-bg-'.$variant,
        ($pill) ? 'rounded-pill' : ''
    ])));

@endphp

<span {{ $attributes->merge(['class' => $classes])}}>
    @if ($icon)
        <i class="bi bi-{{ $icon }}"></i>
    @endif
{{ $slot }}</span>
