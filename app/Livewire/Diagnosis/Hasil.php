<?php

namespace App\Livewire\Diagnosis;

use App\Models\Penyakit;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.guest')]
class Hasil extends Component
{
    public ?float $cf;
    public ?Penyakit $penyakit;

    #[On('showHasil')]
    public function showHasil(array $diagnosa)
    {
        $this->cf = $diagnosa['cf'];
        $this->penyakit = Penyakit::find($diagnosa['id_penyakit']);
    }

    public function repeatDiagnosis() { 
        $this->redirectRoute('diagnosis');
    }

    public function render()
    {
        return view('livewire.diagnosis.hasil');
    }
}
