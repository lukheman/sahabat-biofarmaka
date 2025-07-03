<?php

namespace App\Livewire\Diagnosis;

use App\Models\Gejala;
use App\Models\Tanaman;
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
    public ?int $selectedPlant = null;

    public ?Gejala $currentGejala = null;

    #[Validate('required', message: 'Pilih tingkat keyakinan terlebih dahulu untuk melanjutkan.')]
    public ?float $currentCeraintyFactor = null;

    public array $certaintyFactorUser = [];

    public $showHasil = false;

    #[Computed]
    public function tanaman() {
        return Tanaman::all();
    }

    #[Computed]
    public function gejala()
    {
        // Filter symptoms by selected plant, or return all if no plant is selected
        if ($this->selectedPlant) {
            return Gejala::where('plant_type', $this->selectedPlant)->get();
        }
        return collect(); // Return empty collection until a plant is selected
    }

    public function selectPlant($id)
    {
        $this->selectedPlant = $id;
        $this->currentGejala = Gejala::find($id);
        $this->certaintyFactorUser = []; // Reset previous answers
        $this->showHasil = false; // Ensure result is hidden
    }

    public function setCeraintyFactor()
    {
        if ($this->currentGejala) {
            $this->certaintyFactorUser[$this->currentGejala->id] = $this->currentCeraintyFactor;
        }
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
            // No more symptoms, start diagnosis
            $this->startDiagnosis();
        }
    }

    public function startDiagnosis()
    {
        $diagnosa = CertaintyFactorProvider::diagnosis($this->certaintyFactorUser);
        $this->dispatch('showHasil', $diagnosa);
        $this->showHasil = true;
    }

    public function mount()
    {
        // Don't load any symptom until a plant is selected
        $this->currentGejala = null;
    }

    public function render()
    {
        return view('livewire.diagnosis.index');
    }
}
