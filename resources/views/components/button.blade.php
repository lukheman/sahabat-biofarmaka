@props([
    'variant' => 'primary',
    'icon' => null,
    'class' => '',
    'outline' => false,
    'size' => 'md'
])

@php
    $classes = trim(implode(' ', array_filter([
        'btn',
        $outline ? 'btn-outline-' . $variant : 'btn-' . $variant,
        'btn-' . $size,
        $class
    ])));
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    @if ($icon)
        <i class="bi bi-{{ $icon }}"></i>
    @endif
    {{ $slot }}
</button>
