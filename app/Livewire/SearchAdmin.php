<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;


class SearchAdmin extends AdminComponent
{
    #[Reactive]
    public $results = [];

    #[Reactive]
    public $show ;

    public $admin;

    public function mount($admin = false)
    {
        $this->admin = $admin;
    }

    public function render()
    {
        return view('livewire.search-admin');
    }
}
