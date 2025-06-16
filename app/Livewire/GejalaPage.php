<?php

namespace App\Livewire;

use App\Livewire\Forms\GejalaForm;
use App\Traits\HasNotify;
use App\Traits\WithConfirmation;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Gejala;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;


#[Lazy]
#[Title('Gejala')]
class GejalaPage extends Component
{

    use WithPagination;
    use WithConfirmation;
    use HasNotify;

    public $formModalState = 'create';

    public GejalaForm $form;

    #[Computed]
    public function modalTitle() {
        if ($this->formModalState === 'create') return 'Tambah Data';
        if ($this->formModalState === 'edit') return 'Edit Data';
    }

    public function render()
    {
        return view('livewire.gejala-page');
    }

    public function edit($gejala) {

        $this->form->kode = $gejala['kode'];
        $this->form->nama = $gejala['nama'];

        $this->form->gejala = Gejala::find($gejala['id']);

        $this->formModalState = 'edit';

    }

    public function clear() {
        $this->form->reset();
        $this->formModalState = 'create';
    }

    public function save() {
        $this->form->store();
        $this->dispatch('close-modal', target: 'modal-form-gejala');
        $this->notifySuccess('Berhasil menambahkan gejala baru');
    }

    public function update() {
        $this->form->update();
        $this->dispatch('close-modal', target: 'modal-form-gejala');
        $this->notifySuccess('Berhasil memperbarui gejala');
    }

    public function delete($id) {
        $this->form->gejala = Gejala::find($id);
        $this->deleteConfirmation('Yakin untuk menghapus data gejala ini ?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed() {
        $this->notifySuccess("Berhasil menghapus gejala: {$this->form->gejala->kode} - {$this->form->gejala->nama}");
        $this->form->delete();
    }

    #[Computed]
    public function gejala() {

        return Gejala::paginate(10);

    }
}
