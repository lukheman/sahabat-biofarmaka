<div class="form-group">
    <label>{{ $label ?? ''}}</label>
    <textarea @if($disabled ?? false) disabled @endif rows="5" wire:model="{{ $model }}" class="form-control" placeholder="{{ $placeholder ?? ''}}"></textarea>

</div>
