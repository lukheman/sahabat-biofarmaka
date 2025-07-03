<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Tanaman;
use Livewire\WithPagination;
use App\Traits\HasNotify;
use App\Traits\WithConfirmation;

use Livewire\Attributes\On;

use App\Livewire\Forms\TanamanForm;

#[Title('Tanaman')]
class TanamanPage extends Component
{

    use WithPagination;
    use WithConfirmation;
    use HasNotify;

    public TanamanForm $form;

    public string $formModalState = 'create';

    #[Computed]
    public function modalTitle() {
        if ($this->formModalState === 'create') return 'Tambah Data';
        if ($this->formModalState === 'edit') return 'Edit Data';
    }

    #[Computed]
    public function tanaman() {

        return Tanaman::paginate(10);

    }

    public function clear() {
        $this->form->reset();
        $this->formModalState = 'create';
    }

    public function edit($tanaman) {

        $this->form->nama = $tanaman['nama'];

        $this->form->tanaman = Tanaman::find($tanaman['id']);

        $this->formModalState = 'edit';

    }

    public function save() {
        $this->form->store();
        $this->dispatch('close-modal', target: 'modal-form-tanaman');
        $this->notifySuccess('Berhasil menambahkan tanaman baru');
    }

    public function update() {
        $this->form->update();
        $this->dispatch('close-modal', target: 'modal-form-tanaman');
        $this->notifySuccess('Berhasil memperbarui tanaman');
    }

    public function delete($id) {
        $this->form->tanaman = tanaman::find($id);
        $this->deleteConfirmation('Yakin untuk menghapus data tanaman ini ?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed() {
        $this->notifySuccess("Berhasil menghapus tanaman: {$this->form->tanaman->nama}");
        $this->form->delete();
    }

    public function render()
    {
        return view('livewire.tanaman-page');
    }
}
