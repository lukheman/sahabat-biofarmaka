<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Landing extends Component
{
    #[Computed]
    public function gejala() {
        return \App\Models\Gejala::all();

    }

    #[Computed]
    public function penyakit() {
        return \App\Models\Penyakit::all();
    }

    public function render()
    {
        return view('livewire.landing');
    }
}
