<?php

namespace App\Livewire;

use App\Livewire\Forms\PenyakitForm;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Penyakit;
use Livewire\WithPagination;

use App\Traits\HasNotify;
use App\Traits\WithConfirmation;

#[Title('Penyakit')]
#[Lazy]
class PenyakitPage extends Component
{

    use HasNotify;

    use WithPagination;
    use WithConfirmation;

    public PenyakitForm $form;

    public string $formModalState = 'create';

    #[Computed]
    public function penyakit() {
        return Penyakit::paginate(10);
    }

    #[Computed]
    public function modalTitle() {
        if ($this->formModalState === 'create') return 'Tambah Data';
        if ($this->formModalState === 'edit') return 'Edit Data';
        if ($this->formModalState === 'detail') return 'Detail Data';
    }

    public function clear() {
        $this->form->reset();
        $this->formModalState = 'create';
    }

    public function detail($penyakit) {
        $this->formModalState = 'detail';

        $this->form->nama = $penyakit['nama'];
        $this->form->kode = $penyakit['kode'];
        $this->form->deskripsi = $penyakit['deskripsi'];
        $this->form->solusi = $penyakit['solusi'];
    }

    public function save() {
        $this->form->store();
        $this->dispatch('close-modal', target: 'modal-form-penyakit');
        $this->notifySuccess('Berhasil menambahkan penyakit baru');
    }

    public function edit($penyakit) {
        $this->formModalState = 'edit';

        $this->form->nama = $penyakit['nama'];
        $this->form->kode = $penyakit['kode'];
        $this->form->deskripsi = $penyakit['deskripsi'];
        $this->form->solusi = $penyakit['solusi'];

        $this->form->penyakit = Penyakit::find($penyakit['id']);
    }

    public function update() {
        $this->form->update();
        $this->dispatch('close-modal', target: 'modal-form-penyakit');
        $this->notifySuccess('Berhasil memperbarui penyakit');
    }

    public function delete($id) {
        $this->form->penyakit = Penyakit::find($id);
        $this->deleteConfirmation('Yakin untuk menghapus data penyakit ini ?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed() {
        $this->notifySuccess("Berhasil menghapus penyakit: {$this->form->penyakit->kode} - {$this->form->penyakit->nama}");
        $this->form->delete();
    }


    public function render()
    {
        return view('livewire.penyakit-page');
    }
}
