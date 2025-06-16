<div>

    <x-card>


        <x-modal title="{{ $this->modalTitle }}" id="modal-gejala-penyakit" size="xl">



            <div class="row">


            <div class="col-12 col-md-7">
            <x-card >

                <x-table>

                    <x-slot:columns>
                        <th>Kode</th>
                        <th>Gejala</th>
                        <th>MB</th>
                        <th>MD</th>
                        <th class="text-end">Aksi</th>
                    </x-slot:columns>

                    <x-slot:rows>

                        @if ($selectedPenyakit)

                            @foreach ($selectedPenyakit->gejala as $item)
                            <tr>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->nama }}</td>
                                <td> <x-badge variant="success">{{ $item->pivot->mb }}</x-badge></td>
                                <td> <x-badge variant="warning">{{ $item->pivot->md }}</x-badge></td>
                                <td class="text-end">
            <x-button size="sm" variant="warning" icon="pencil" wire:click="editGejalaPenyakit({{ $item->id }})">Edit</x-button>
                                    <x-button size="sm" variant="danger" icon="trash" wire:click="deleteGejalaPenyakit({{ $item->id }})">Hapus</x-button>
                                </td>
                            </tr>
                        @endforeach
                        @endif


                    </x-slot:rows>

                </x-table>

            </x-card>
             </div>

            <div class="col-12 col-md-5">

            <x-card >

            <form wire:submit.prevent="saveGejalaPenyakit">

                <x-select placeholder="Pilih Gejala" model="selectedIdGejala" label="Gejala">
                    @foreach ($this->gejala as $item)
                        <option value="{{ $item->id }}">{{ $item->kode}} - {{ $item->nama }}</option>
                    @endforeach
                </x-select>

                <x-input model="mb" name="mb" label="MB" type="number" min="0" max="1" step="0.01" required />

                <x-input model="md" name="md" label="MD" type="number" min="0" max="1" step="0.01" required />

                <x-button type="submit" class="float-end mt-2">Simpan</x-button>
            </form>

            </x-card>
        </div>

        </div>




        </x-modal>


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

                        <x-modal.trigger target="modal-gejala-penyakit" icon="eye" wire:click="detail({{ $item->id }})">Gejala Penyakit</x-modal.trigger>

                    </td>
                </tr>
                @endforeach

            </x-slot:rows>


        </x-table>

    </x-card>

</div>
