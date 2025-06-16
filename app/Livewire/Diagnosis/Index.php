<?php

namespace App\Livewire\Diagnosis;

use App\Models\Gejala;
use App\Providers\CertaintyFactorProvider;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Diagnosis')]
#[Layout('layouts.guest')]
class Index extends Component
{
    public ?Gejala $currentGejala = null;

    #[Validate('required')]
    public ?float $currentCeraintyFactor = null;

    public array $certaintyFactorUser = [];

    public $showHasil = false;

    #[Computed]
    public function gejala() {
        return Gejala::all();
    }

    public function setCeraintyFactor()
    {
        $this->certaintyFactorUser[$this->currentGejala->id] = $this->currentCeraintyFactor;
    }

    public function updateCurrentCertaintyFactor(float $value)
    {
        $this->currentCeraintyFactor = $value;
        $this->nextGejala();
    }


    public function nextGejala()
    {
        $this->validate();
        $this->setCeraintyFactor();
        $this->reset('currentCeraintyFactor');

        $gejala = Gejala::where('id', '>', $this->currentGejala->id)->first();
        if ($gejala) {
            $this->currentGejala = $gejala;
        } else {
            // gejala terakhir, lakukan diagnosis dengan Certainty Factor
            $this->startDiagnosis();
        }
    }

    public function startDiagnosis() {

        $diagnosa = CertaintyFactorProvider::diagnosis( $this->certaintyFactorUser);
        $this->dispatch('showHasil', $diagnosa);
        $this->showHasil = true;

    }

    public function mount()
    {
        $this->currentGejala = Gejala::first();
    }

    public function render()
    {
        return view('livewire.diagnosis.index');
    }
}
