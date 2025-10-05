<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Penyakit;
use Illuminate\Support\Facades\Storage;


class PenyakitForm extends Form
{

    public ?Penyakit $penyakit = null;

    public string $kode = '';

    #[Validate('required')]
    public $nama = '';

    #[Validate('nullable')]
    public $deskripsi = '';

    #[Validate('nullable')]
    public $solusi = '';

    public $photo;


    protected function rules(): array
    {
        return [
            'kode' => [
                'required',
                 Rule::unique('penyakit', 'kode')->ignore($this->penyakit?->id),
            ],
            'photo' => ['nullable', 'image', 'max:2048'], // Max 2MB
        ];
    }

    protected function messages(): array {
        return [
            'kode.unique' => 'Kode penyakit telah digunakan',
            'kode.required' => 'Kode penyakit belum ada',
            'nama.required' => 'Nama penyakit belum ada',

            'photo.image' => 'File yang diunggah harus berupa gambar.',
            'photo.max' => 'Ukuran foto maksimal 2MB.',
        ];
    }

    public function store() {

        $penyakit = Penyakit::query()->create($this->validate());

        if ($this->photo) {
            // Store new photo
            $path = $this->photo->store('photos', 'public');
            $penyakit->update([
                'photo' => $path
            ]);
        }

        $this->reset();
    }

    public function update() {

        $this->validate();

        $this->penyakit->update([

            'kode' => $this->kode,
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'solusi' => $this->solusi,

        ]);

        if ($this->photo) {
            // Delete old photo if exists
            if ($this->penyakit->photo) {
                Storage::disk('public')->delete($this->penyakit->photo);
            }
            // Store new photo
            $path = $this->photo->store('photos', 'public');
            $this->penyakit->update([
                'photo' => $path
            ]);

        }

        $this->reset();
    }

    public function delete() {
        $this->penyakit->delete();
        $this->reset();
    }

}
