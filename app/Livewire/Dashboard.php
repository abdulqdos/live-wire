<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends AdminComponent
{
    #[Title('Admin Dashboard')]
    public function render()
    {
        return view('livewire.dashboard');
    }
}
