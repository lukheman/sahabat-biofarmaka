<?php

namespace App\Livewire;

use App\Models\Penyakit;
use App\Models\Tanaman;
use App\Traits\HasNotify;
use App\Traits\WithConfirmation;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;

#[Title('Penyakit Tanaman')]
class PenyakitTanamanTable extends Component
{
    use WithPagination;
    use HasNotify;
    use WithConfirmation;

    public ?Tanaman $selectedTanaman = null;
    public $namaTanaman = '';
    public $selectedPenyakitTanamanId = [];

    #[Computed]
    public function penyakit() {
        return Penyakit::query()->paginate(10);
    }

    #[Computed]
    public function tanaman() {
        return Tanaman::query()->paginate(10);
    }

    #[Computed]
    public function modalTitle() {
        return "Penyakit $this->namaTanaman";
    }

    public function simpanPenyakitTanaman() {
        $this->selectedTanaman->penyakit()->sync($this->selectedPenyakitTanamanId);
        $this->notifySuccess("Berhasil menyimpan penyakit tanaman $this->namaTanaman");
    }

    public function penyakitTanaman($id) {
        $this->selectedTanaman = Tanaman::with('penyakit')->find($id);
        $this->namaTanaman = $this->selectedTanaman->nama;
        $this->selectedPenyakitTanamanId = $this->selectedTanaman->penyakit->pluck('id')->toArray();
    }

    public function render()
    {
        return view('livewire.penyakit-tanaman-table');
    }
}
