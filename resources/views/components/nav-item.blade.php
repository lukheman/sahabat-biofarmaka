@props(['active' => false, 'icon' => 'activity'])

@php
    $classes = ($active ?? false) ? 'nav-link active' : 'nav-link';
@endphp

<li class="nav-item">
    <a {{ $attributes->merge(['class' => $classes])}}>
        <i class="text-primary nav-icon bi bi-{{ $icon }}"></i>
        <p class="text-secondary"><strong>{{ $slot }}</strong></p>
    </a>
</li>
