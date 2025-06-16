<div class="row justify-content-center">

    <div class="col-12 col-md-4">
        <x-card title="Foto Profil" class="shadow mb-4">
            <div class="text-center">
                <img alt="Foto Profil" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;"

                src="{{ asset('storage/' . (auth()->user()->photo ?? '')) }}"
                >
                <form wire:submit.prevent="updateProfilePhoto">
                    <x-input type="file" model="photo" name="photo" accept="image/*"
                        :description="$errors->has('photo') ? $errors->first('photo') : null"
                    />
                    <div class="mt-3">
                        <x-button type="submit" class="btn btn-primary" class="float-end">Ganti Foto</x-button>
                    </div>
                </form>
            </div>
        </x-card>

    </div>
    <div class="col-12 col-md-8">
    <x-card title="Profil Saya" class="max-w-xl mx-auto shadow">

        <form wire:submit.prevent="updateProfile">
                <x-input label="Nama Lengkap" model="name"
                    :description="$errors->has('name') ? $errors->first('name') : null"
                />

                <x-input label="Email" type="email" model="email"
                    :description="$errors->has('email') ? $errors->first('email') : null"
                />

                <x-input label="Password Baru" type="password" model="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti"
                    :description="$errors->has('password') ? $errors->first('password') : null"
                />

            <div class="mt-4 text-end">
                <x-button type="submit" class="btn btn-primary">Simpan Perubahan</x-button>
            </div>
        </form>

    </x-card>
</div>
</div>
