<div class="form-group mb-3">
    <label class="form-label">{{ $label ?? '' }}</label>
    <input
        @if($disabled ?? false) disabled @endif
        type="{{ $type ?? 'text' }}"
        class="form-control"
        wire:model="{{ $model ?? '' }}"
        min={$min ?? ''}
        max="{{ $max ?? '' }}"
        step="{{ $step ?? '' }}"
        placeholder="{{ $placeholder ?? '' }}"
    >

    <div class="form-text text-danger">{{ $description ?? ''}}</div>
</div>
