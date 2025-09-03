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

#[Title('Penakit Tanaman')]
class PenyakitTanamanTable extends Component
{
    use WithPagination;
    use HasNotify;
    use WithConfirmation;

    public ?Tanaman $selectedTanaman = null;
    public $namaTanaman = '';

    public $modalTitle = '';

    #[Computed]
    public function penyakit() {
        return Penyakit::paginate(10);
    }

    #[Computed]
    public function tanaman() {
        return Tanaman::paginate(10);
    }

    #[Computed]
    public function modalTitle() {
        return "Penyakit $this->namaTanaman";
    }

    public function detail($id) {
        $this->selectedTanaman = Tanaman::with('penyakit')->find($id);
        $this->namaTanaman = $this->selectedTanaman->nama;
    }

    public function render()
    {
        return view('livewire.penyakit-tanaman-table');
    }
}
