<?php

namespace App\Livewire;

use App\Traits\HasNotify;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\User;
use Livewire\WithFileUploads;


#[Title('Profil')]
class Profile extends Component
{

    use HasNotify;

    use WithFileUploads;

    public User $user;

    #[Validate(['required', 'string'])]
    public string $name = '';

    #[Validate(['required', 'email'])]
    public string $email = '';

    #[Validate(['nullable', 'string', 'min:6', 'max:255'])]
    public string $password = '';

    #[Validate('image|max:1024')]
    public $photo;

    public function updateProfile() {
        $this->validate();

        $this->user->name = $this->name;
        $this->user->email = $this->email;

        if (!empty($this->password)) {
            $this->user->password = bcrypt($this->password);
        }

        if ($this->user->isDirty()) {
            $this->user->save();
            session()->flash('success', 'Profil berhasil diperbarui.');
            $this->notifySuccess('Profil berhasil diperbarui.');
        } else {
            $this->notifyInfo('Tidak ada perubahan pada profil.');
        }

    }

    public function updateProfilePhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        if ($this->photo) {

            // hapus foto lama jika ada
            if ($this->user->photo) {
                $oldPhotoPath = storage_path('app/public/' . $this->user->photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $path = $this->photo->store('photos', 'public');
            $this->user->photo = $path;
            $this->user->save();
            $this->notifySuccess('Foto profil berhasil diperbarui.');

            // reload halaman
            $this->mount();

        }
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.min' => 'Password minimal 6 karakter.',
        ];
    }

    public function mount()
    {
        $this->user = auth()->user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
