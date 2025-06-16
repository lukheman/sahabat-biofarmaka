<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Penyakit;


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


    protected function rules(): array
    {
        return [
            'kode' => [
                'required',
                 Rule::unique('penyakit', 'kode')->ignore($this->penyakit?->id),
            ],
        ];
    }

    protected function messages(): array {
        return [
            'kode.unique' => 'Kode penyakit telah digunakan',
            'kode.required' => 'Kode penyakit belum ada',
            'nama.required' => 'Nama penyakit belum ada'
        ];
    }

    public function store() {

        Penyakit::create($this->validate());

        $this->reset();
    }

    public function update() {

        $this->penyakit->update($this->validate());
        $this->reset();
    }

    public function delete() {
        $this->penyakit->delete();
        $this->reset();
    }

}
