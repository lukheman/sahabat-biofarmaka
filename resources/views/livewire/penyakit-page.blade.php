<div>

    <x-card>

        <x-modal title="{{ $this->modalTitle }}" id="modal-form-penyakit" size="xl">

            <x-input label="Kode Penyakit" model="form.kode"
                :description="$errors->has('form.kode') ? $errors->first('form.kode') : null"

            />

            <x-input label="Jenis Penyakit" model="form.nama"

                :description="$errors->has('form.nama') ? $errors->first('form.nama') : null"
            />

            <x-textarea label="Deskripsi Penyakit" model="form.deskripsi" />
            <x-textarea label="Solusi Penyakit" model="form.solusi" />

            @if ($formModalState !== 'detail')
                <x-button variant="{{ $formModalState === 'edit' ? 'warning' : 'primary' }}" class="mt-2" wire:click="{{ $formModalState === 'edit' ? 'update' : 'save' }}">Simpan</x-button>

            @endif
        </x-modal>


        <x-slot:heading>
            <x-modal.trigger target="modal-form-penyakit" class="float-end" wire:click="clear">Tambah Penyakit</x-modal.trigger>
        </x-slot:heading>

        <x-table :paginate="$this->penyakit">

            <x-slot:columns>
                <th>#</th>
                <th>Kode</th>
                <th>Nama</th>
                <th class="text-end">Aksi</th>
            </x-slot:columns>

            <x-slot:rows>
                @foreach ($this->penyakit as $item)
                <tr>
                    <td>{{ $loop->index + $this->penyakit->firstItem() }}</td>
                    <td>{{ $item->kode }}</td>
                        <td>{{ $item->nama }}</td>
                    <td class="text-end">

                        <x-modal.trigger target="modal-form-penyakit" variant="info" icon="eye" wire:click="detail({{ $item }})">Detail</x-modal.trigger>
                        <x-modal.trigger target="modal-form-penyakit" variant="warning" icon="pencil" wire:click="edit({{ $item }})" >Edit</x-modal.trigger>
                        <x-button variant="danger" icon="trash" wire:click="delete({{ $item->id}})">Hapus</x-button>


                    </td>
                </tr>
                @endforeach

            </x-slot:rows>


        </x-table>

    </x-card>

</div>
