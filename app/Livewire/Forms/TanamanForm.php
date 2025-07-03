<?php

namespace App\Livewire\Forms;

use App\Models\Tanaman;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TanamanForm extends Form
{
    public ?Tanaman $tanaman = null;

    #[Validate('required')]
    public string $nama = '';

    protected function messages(): array {
        return [
            'nama.required' => 'Nama tanaman belum ada'
        ];
    }

    public function store() {
        Tanaman::create($this->validate());
        $this->reset();
    }

    public function update() {
        $this->tanaman->update($this->validate());
        $this->reset();
    }

    public function delete() {
        $this->tanaman->delete();
        $this->reset();
    }
}
