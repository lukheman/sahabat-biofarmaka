@props([
    'icon' => null,
    'text' => '',
    'number' => '',
    'variant' => 'primary',
])

<div class="info-box">
    <span class="info-box-icon text-bg-{{ $variant }} shadow-sm">
        <i class="bi bi-{{ $icon ?? ''}}"></i>
    </span>
    <div class="info-box-content">
        <span class="info-box-text">{{ $text ?? ''}}</span>
        <span class="info-box-number"> {{ $number ?? ''}} </span>
    </div>
</div>
