<div>

    <x-card>

        <x-modal id="modal-form-tanaman" title="{{ $this->modalTitle }}">

        <x-input
        label="Nama Tanaman"
        model="form.nama"
        :description="$errors->has('form.nama') ? $errors->first('form.nama') : null"
        />

        <x-button variant="{{ $formModalState === 'edit' ? 'warning' : 'primary' }}" class="mt-2" wire:click="{{ $formModalState === 'edit' ? 'update' : 'save' }}">Simpan</x-button>
        </x-modal>


        <x-slot:heading>
        <x-modal.trigger wire:click="clear" target="modal-form-tanaman" class="float-end">Tambah Data</x-modal.trigger>
        </x-slot:heading>

        <x-table :paginate="$this->tanaman">

        <x-slot:columns>
        <th>#</th>
        <th>Nama Tanaman</th>
        <th class="text-end">Aksi</th>
        </x-slot:columns>

        <x-slot:rows>
        @foreach ($this->tanaman as $item)
        <tr>
        <td>{{ $loop->index + $this->tanaman->firstItem() }}</td>
            <td>{{ $item->nama }}</td>
            <td class="text-end">

            <x-modal.trigger target="modal-form-tanaman" variant="warning" icon="pencil" wire:click="edit({{ $item }})">Edit</x-modal.trigger>
        <x-button variant="danger" icon="trash" wire:click="delete({{ $item->id }})">Hapus</x-button>


                    </td>
                </tr>
                @endforeach

            </x-slot:rows>


        </x-table>

    </x-card>

</div>
