<div>

    <x-card>


        <x-modal title="{{ $this->modalTitle }}" id="modal-penyakit-tanaman" size="xl">



            <div class="row">


            <div class="col-12 col-md-12">
        @foreach ($penyakitList as $item)
        <div class="form-check">
            <input wire:model="selectedPenyakitTanamanId" class="form-check-input" type="checkbox" value="{{ $item->id }}">
            <label class="form-check-label">{{ $item->nama }}</label>
        </div>

        @endforeach

             </div>
            <div class="col-12 col-md-12">
            <x-button wire:click="simpanPenyakitTanaman" variant="success" class="float-end">Simpan</x-button>
            </div>


        </div>




        </x-modal>


        <x-table :paginate="$this->penyakit">

            <x-slot:columns>
                <th>#</th>
                <th>Nama</th>
                <th class="text-end">Aksi</th>
            </x-slot:columns>

            <x-slot:rows>
                @foreach ($this->tanaman as $item)
                <tr>
                    <td>{{ $loop->index + $this->penyakit->firstItem() }}</td>
                        <td>{{ $item->nama }}</td>
                    <td class="text-end">

                        <x-modal.trigger class="text-white" target="modal-penyakit-tanaman" icon="eye" wire:click="penyakitTanaman({{ $item->id }})">Penyakit Tanaman</x-modal.trigger>

                    </td>
                </tr>
                @endforeach

            </x-slot:rows>


        </x-table>

    </x-card>

</div>
