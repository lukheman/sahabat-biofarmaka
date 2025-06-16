<div>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center">
            <h1 class="animate__fadeIn">Sistem Pakar Diagnosa Penyakit Tanaman <br> <span class="text-white">Biofarkaka</span></h1>
            <p class="animate__fadeIn" style="animation-delay: 0.3s;">Mendiagnosa gejala penyakit tanaman biofarmaka dengan cepat, akurat, dan terpercaya.</p>
            <a wire:navigate href="{{ route('diagnosis') }}" class="btn btn-primary animate__fadeIn" style="animation-delay: 0.6s;">Mulai Diagnosa Sekarang</a>

        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="bg-light">
        <div class="container text-center">
            <h2 class="section-title animate__fadeIn">Tentang Biofarkaka</h2>
            <p class="mx-auto animate__fadeIn" style="max-width: 700px; animation-delay: 0.3s;">
                Biofarkaka adalah sistem pakar inovatif yang dirancang untuk membantu Anda mendeteksi kemungkinan penyakit tanaman biofarmaka berdasarkan gejala yang terlihat. Dengan teknologi berbasis pengetahuan, kami memberikan diagnosa awal yang cepat, akurat, dan mudah dipahami.
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
