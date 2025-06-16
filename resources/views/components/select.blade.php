@props([
    'placeholder',
    'model' => null,
    'label' => null,
])

<div class="form-group">
    <label class="form-label">{{ $label ?? '' }}</label>
    <select class="form-select" wire:model="{{ $model ?? '' }}">
        @if (isset($placeholder))
          <option selected>{{ $placeholder }}</option>
        @endif
        {{ $slot }}
    </select>
</div>
