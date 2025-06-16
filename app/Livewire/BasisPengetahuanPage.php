<?php

namespace App\Livewire;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Traits\HasNotify;
use App\Traits\WithConfirmation;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;

#[Title('Basis Pengetahuan')]
#[Lazy]
class BasisPengetahuanPage extends Component
{

    use WithPagination;
    use HasNotify;
    use WithConfirmation;

    public ?Penyakit $selectedPenyakit;
    public $namaPenyakit = '';
    public $kodePenyakit = '';

    public $modalState = 'detail';

    public ?int $selectedIdGejala;
    public float $mb = 0;
    public float $md = 0;

    public function saveGejalaPenyakit() {
        // selain menambahakan gejala gejala, juga memperbarui gejaa yang sudah ada

        $this->selectedPenyakit->gejala()->syncWithoutDetaching([
            $this->selectedIdGejala => [
                'mb' => $this->mb,
                'md' => $this->md,
            ]
        ]);

        $this->notifySuccess('Berhasil memperbarui gejala ke penyakit');

    }

    public function editGejalaPenyakit($id) {
        $this->selectedIdGejala = $id;
        $gejala = $this->selectedPenyakit->gejala()->find($id);
        $this->mb = $gejala->pivot->mb;
        $this->md = $gejala->pivot->md;


    }


    public function deleteGejalaPenyakit($id) {

        $this->selectedIdGejala = $id;
        $this->deleteConfirmation('Apakah Anda yakin ingin menghapus gejala ini dari penyakit?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed() {
        $this->selectedPenyakit->gejala()->detach($this->selectedIdGejala);
        $this->notifySuccess('Berhasil menghapus gejala dari penyakit');
    }

    public function detail($id) {
        $this->selectedPenyakit = Penyakit::with('gejala')->find($id);
        $this->namaPenyakit = $this->selectedPenyakit->nama;
        $this->kodePenyakit = $this->selectedPenyakit->kode;
    }

    #[Computed]
    public function penyakit() {
        return Penyakit::paginate(10);
    }

    #[Computed]
    public function gejala() {
        return Gejala::all();
    }

    #[Computed]
    public function modalTitle() {
        return "Gejala Penyakit $this->kodePenyakit -  $this->namaPenyakit";
    }


    public function render()
    {
        return view('livewire.basis-pengetahuan-page');
    }
}
