<div>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center">
            <h1 class="animate__fadeIn">Sistem Pakar Diagnosa Penyakit Tanaman <br> <span class="text-white">Biofarmaka</span></h1>
            <p class="animate__fadeIn" style="animation-delay: 0.3s;">Mendiagnosa gejala penyakit tanaman biofarmaka dengan cepat, akurat, dan terpercaya.</p>
            <a wire:navigate href="{{ route('diagnosis') }}" class="btn btn-primary animate__fadeIn" style="animation-delay: 0.6s;">Diagnosis</a>

        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="bg-light">
        <div class="container text-center">
            <h2 class="section-title animate__fadeIn">Tentang Biofarmaka</h2>
            <p class="mx-auto animate__fadeIn" style="max-width: 700px; animation-delay: 0.3s;">
Biofarmaka adalah kelompok tanaman obat yang mengandung senyawa aktif dan digunakan
untuk pengobatan, pencegahan, atau pemeliharaan kesehatan. Tanaman ini dapat berupa
tanaman herbal dan rempah-rempah. Contoh tanaman biofarmaka adalah jahe, kunyit,
lengkuas, temulawak, meniran dan lain-lain
            </p>
        </div>
    </section>

    <!-- Gejala Cards -->
    <section id="gejala">
        <div class="container">
            <h2 class="section-title animate__fadeIn">Gejala yang Dikenali</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($this->gejala as $item)
                <div class="col">
                    <div class="card h-100 animate__fadeIn" style="animation-delay: 0.2s;">
                        <h5 class="card-title"><i class="fas fa-bug me-2"></i> {{ $item->nama}}</h5>



                    <!-- <p class="card-text">Munculnya bercak-bercak tidak wajar pada daun, biasanya akibat jamur atau bakteri.</p> -->

                    </div>
                </div>

                    @endforeach

            </div>
        </div>
    </section>

    <!-- Penyakit Cards -->
    <section id="penyakit" class="bg-light">
        <div class="container">
            <h2 class="section-title animate__fadeIn">Jenis Penyakit yang Terdeteksi</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($this->penyakit as $item)

                <div class="col">
                    <div class="card h-100 animate__fadeIn" style="animation-delay: 0.2s;">
                        <h5 class="card-title"><i class="fas fa-leaf me-2"></i> {{ $item->nama }}</h5>
                        <p class="card-text">{{ $item->deskripsi }}</p>
                    </div>
                </div>

                    @endforeach
            </div>
        </div>
    </section>
    {{-- Success is as dangerous as failure. --}}
</div>
