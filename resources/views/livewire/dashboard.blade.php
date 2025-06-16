<div>
    <div class="row">

        <div class="col-12 col-md-6">
            <!-- info box jumlah penyakit -->
            <x-info-box icon="virus" text="Jumlah Penyakit" number="{{ $jumlahPenyakit }}" variant="warning"/>
        </div>

        <div class="col-12 col-md-6">
            <!-- info box jumlah gejala -->
            <x-info-box icon="exclamation-triangle" text="Jumlah Gejala" number="{{ $jumlahGejala }}" variant="success" />

        </div>

    </div>
</div>
