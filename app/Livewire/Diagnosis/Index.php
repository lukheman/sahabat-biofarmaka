<?php

namespace App\Livewire\Diagnosis;

use App\Models\Gejala;
use App\Models\GejalaPenyakitTanaman;
use App\Models\PenyakitTanaman;
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
    public ?Tanaman $selectedTanaman;

    public ?Gejala $currentGejala = null;

    #[Validate('required', message: 'Pilih tingkat keyakinan terlebih dahulu untuk melanjutkan.')]
    public ?float $currentCeraintyFactor = null;

    public array $certaintyFactorUser = [];

    public $showHasil = false;

    public $gejalaList = [];

    #[Computed]
    public function tanaman() {
        return Tanaman::all();
    }

    public function selectPlant(int $id)
    {
        $this->selectedTanaman = Tanaman::query()->with(['penyakit'])->find($id);
        $this->currentGejala = Gejala::query()->find($id);
        $this->certaintyFactorUser = []; // Reset previous answers
        $this->showHasil = false; // Ensure result is hidden

        $penyakitIds = $this->selectedTanaman->penyakit->pluck('id')->toArray();

        $this->gejalaList = GejalaPenyakitTanaman::query()
            ->whereIn('id_penyakit_tanaman', $penyakitIds)
            ->distinct('id_gejala')
            ->pluck('id_gejala')
            ->pipe(function ($gejalaIds) {
                return Gejala::query()->whereIn('id', $gejalaIds)->get();
            });

        // set gejala pertama
        $this->currentGejala = $this->gejalaList->first();

            // ->pipe(function ($gejala) {
            //     $this->currentGejala = $gejala->first();
            //     return $gejala;
            // });

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

        if(!$this->currentGejala){
            return;
        }


        // cari index gejala saat ini
        $currentIndex = $this->gejalaList->search(fn($g) => $g->id === $this->currentGejala->id);

        // ambil gejala berikutnya
        $nextGejala = $this->gejalaList->get($currentIndex + 1);

        if ($nextGejala) {
            $this->currentGejala = $nextGejala;
        } else {
            // tidak ada gejala lagi, mulai diagnosis
            $this->startDiagnosis();
        }
    }

    public function startDiagnosis()
    {
        $diagnosa = CertaintyFactorProvider::diagnosis($this->certaintyFactorUser, $this->selectedTanaman);
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
