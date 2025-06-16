<div>
    <div class="card shadow-lg h-100 animate__fadeIn" style="background: var(--card-bg); border: none; border-radius: 12px; padding: 2rem;">
        <h5 class="card-title text-center mb-4" style="font-size: 1.8rem; font-weight: 600; color: var(--primary);">Hasil Diagnosa</h5>

        <div class="mb-4 px-3">
            <div class="alert alert-success d-flex align-items-center" style="border-radius: 8px; background-color: #e6f4ea; color: var(--primary);">
                <i class="fas fa-leaf me-2"></i>
                <span class="fw-bold">Penyakit teridentifikasi: <span class="text-uppercase">{{ $penyakit?->nama }}</span></span>
            </div>

            <div class="mb-4">
                <h6 class="text-secondary fw-medium">Tingkat Keyakinan:</h6>
                <div class="progress" style="height: 28px; border-radius: 8px; background-color: #e9ecef;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $cf * 100 }}%; background-color: var(--primary); font-size: 1rem;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                    {{ number_format($cf * 100, 2) }}%
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h6 class="text-success fw-medium">Deskripsi</h6>
                <p class="card-text text-justify" style="font-size: 0.95rem; color: var(--text);">
                    {{ $penyakit?->deskripsi }}
                </p>
            </div>

            <div class="mt-4">
                <h6 class="text-success fw-medium">Solusi</h6>
                <p class="card-text text-justify" style="font-size: 0.95rem; color: var(--text);">
                    {{ $penyakit?->solusi }}
                </p>
            </div>

            <div class="mt-4 text-end">
                <a wire:navigate href="{{ route('diagnosis' ) }}" class="btn btn-primary" style="background-color: var(--primary); border-color: var(--primary); padding: 0.5rem 1.5rem; font-weight: 600; border-radius: 8px;">
                    <i class="fas fa-redo-alt me-2"></i>Ulangi Diagnosa
                </a>
            </div>
        </div>
    </div>
</div>
