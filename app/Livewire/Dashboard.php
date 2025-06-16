<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public int $jumlahPenyakit = 0;
    public int $jumlahGejala = 0;

    public function mount()
    {
        $this->jumlahPenyakit = \App\Models\Penyakit::count();
        $this->jumlahGejala = \App\Models\Gejala::count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
