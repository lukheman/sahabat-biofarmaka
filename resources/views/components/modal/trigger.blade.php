@props([
    'variant' => 'primary',
    'target' => null,
    'class' => '',
    'icon' => null,
    'outline' => false
])

@php
    $classes = trim(implode(' ', array_filter([
        'btn',
        $outline ? 'btn-outline-' . $variant : 'btn-' . $variant,
        $class
    ])));
@endphp

<button
    type="button"
    data-bs-toggle="modal"
    data-bs-target="#{{ $target }}"
    {{ $attributes->merge(['class' => $classes]) }}
>

    @if ($icon)
        <i class="bi bi-{{ $icon }}"></i>
    @endif
    {{ $slot }}
</button>
