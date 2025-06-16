@props(['footer' => null, 'id', 'title', 'size' => 'md'])

<div wire:ignore.self class="modal fade" id="{{ $id }}" tabindex="-1">
  <div class="modal-dialog modal-{{ $size }}">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title fs-6"><strong>{{ $title ?? '' }}</strong></h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        {{ $slot }}
      </div>
    @if ($footer)

      <div class="modal-footer">
        {{ $footer ?? ''}}
      </div>

    @endif
    </div>
  </div>
</div>
