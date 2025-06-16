<td class="d-flex gap-2">
    <x-button variant="danger" icon="trash" wire:click="delete({{ $item->id}})">Hapus</x-button>
    <x-modal.trigger variant="warning" target="{{ $target ?? '' }}" icon="pencil" wire:click="edit({{ $item->id}})">Edit</x-modal.trigger>
</td>
