<div>

    <x-card>

        <x-modal id="modal-form-gejala" title="{{ $this->modalTitle }}">

            <x-input
                label="Kode Gejala"
                model="form.kode"
                :description="$errors->has('form.kode') ? $errors->first('form.kode') : null"
            />

            <x-input
                label="Nama Gejala"
                model="form.nama"
                :description="$errors->has('form.nama') ? $errors->first('form.nama') : null"
            />

            <x-button variant="{{ $formModalState === 'edit' ? 'warning' : 'primary' }}" class="mt-2" wire:click="{{ $formModalState === 'edit' ? 'update' : 'save' }}">Simpan</x-button>
        </x-modal>


        <x-slot:heading>
            <x-modal.trigger wire:click="clear" target="modal-form-gejala" class="float-end">Tambah Data</x-modal.trigger>
        </x-slot:heading>

        <x-table :paginate="$this->gejala">

            <x-slot:columns>
                <th>#</th>
                <th>Kode Gejala</th>
                <th>Nama Gejala</th>
                <th class="text-end">Aksi</th>
            </x-slot:columns>

            <x-slot:rows>
                @foreach ($this->gejala as $item)
                <tr>
                    <td>{{ $loop->index + $this->gejala->firstItem() }}</td>
                    <td>{{ $item->kode }}</td>
                        <td>{{ $item->nama }}</td>
                    <td class="text-end">

                        <x-modal.trigger target="modal-form-gejala" variant="warning" icon="pencil" wire:click="edit({{ $item }})">Edit</x-modal.trigger>
                        <x-button variant="danger" icon="trash" wire:click="delete({{ $item->id }})">Hapus</x-button>


                    </td>
                </tr>
                @endforeach

            </x-slot:rows>


        </x-table>

    </x-card>

</div>
