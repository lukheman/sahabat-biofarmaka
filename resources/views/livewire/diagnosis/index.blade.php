<div class="mt-5 row justify-content-center">
    <div class="col-6">
        <div wire:show="showHasil">
            <livewire:diagnosis.hasil />
        </div>

        <div wire:show="!showHasil">
            <x-card title="Diagnosis">
                @if (!$selectedTanaman)
                    <div class="mb-4">
                        <h5 class="card-title"><i class="fas fa-leaf me-2"></i> Pilih Jenis Tanaman</h5>
                        <p class="card-text">Pilih jenis tanaman yang akan didiagnosis:</p>
                        <div class="plant-buttons d-flex flex-wrap justify-content-center">
                            @foreach ($this->tanaman as $plant)
                                <button class="btn btn-outline-primary m-1" wire:click="selectPlant('{{ $plant->id }}')">{{ $plant->nama }}</button>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="mb-4">
                        @if ($currentGejala)
                            <h5 class="card-title"><i class="fas fa-leaf me-2"></i> <span>{{ $currentGejala->nama }}</span></h5>
                            <p class="card-text">Seberapa yakin Anda bahwa tanaman {{ $selectedTanaman->nama }} mengalami gejala ini?</p>
                        @endif

                        @error('currentCeraintyFactor')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confidence Level Buttons -->
                    @if ($currentGejala)
                        <div class="confidence-buttons d-flex flex-wrap justify-content-center">
                            <button class="btn btn-outline-primary m-1" wire:click="updateCurrentCertaintyFactor(1)">Sangat Yakin</button>
                            <button class="btn btn-outline-primary m-1" wire:click="updateCurrentCertaintyFactor(0.8)">Yakin</button>
                            <button class="btn btn-outline-primary m-1" wire:click="updateCurrentCertaintyFactor(0.7)">Cukup Yakin</button>
                            <button class="btn btn-outline-primary m-1" wire:click="updateCurrentCertaintyFactor(0.5)">Sedikit Yakin</button>
                            <button class="btn btn-outline-primary m-1" wire:click="updateCurrentCertaintyFactor(0.3)">Tidak Tahu</button>
                            <button class="btn btn-outline-primary m-1" wire:click="updateCurrentCertaintyFactor(0)">Tidak Yakin</button>
                        </div>
                    @else
                        <p class="card-text text-danger">Belum ada gejala yang dapat ditanyakan untuk {{ $selectedTanaman->nama }}</p>
                    @endif
                @endif
            </x-card>
        </div>
    </div>
</div>
