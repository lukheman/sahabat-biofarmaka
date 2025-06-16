<!-- Diagnosa Section -->

<div class="mt-5 row justify-content-center">

    <div class="col-6">

    <div wire:show="showHasil">

        <livewire:diagnosis.hasil />

    </div>

    <div wire:show="!showHasil">
        <x-card title="Diagnosis">

            <div class="mb-4">

                <h5 class="card-title"><i class="fas fa-leaf me-2"></i> <span>{{ $currentGejala->nama }}</span></h5>
                <p class="card-text">Seberapa yakin Anda bahwa tanaman Anda mengalami gejala ini?</p>
                @error('currentCeraintyFactor')
                <p class="text-danger">Pilih tingkat keyakinan terlebih dahulu untuk melanjutkan.</p>
                @enderror
            </div>

            <!-- Confidence Level Buttons -->
            <div class="confidence-buttons d-flex flex-wrap justify-content-center">
                <button class="btn btn-outline-primary" wire:click="updateCurrentCertaintyFactor(1)"> Sangat Yakin</button>
                <button class="btn btn-outline-primary" wire:click="updateCurrentCertaintyFactor(0.8)"> Yakin</button>
                <button class="btn btn-outline-primary" wire:click="updateCurrentCertaintyFactor(0.7)"> Cukup Yakin</button>
                <button class="btn btn-outline-primary" wire:click="updateCurrentCertaintyFactor(0.5)"> Sedikit Yakin</button>
                <button class="btn btn-outline-primary" wire:click="updateCurrentCertaintyFactor(0.3)"> Tidak Tahu</button>
                <button class="btn btn-outline-primary" wire:click="updateCurrentCertaintyFactor(0)"> Sangat Yakin</button>
            </div>

            <div class="text-end">
            </div>

        </x-card>
    </div>

    </div>



</div>










