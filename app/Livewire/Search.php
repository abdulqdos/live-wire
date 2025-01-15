<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Isolate;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Isolate]
class Search extends Component
{
    #[Url(as: 'q',except: '')]
    public $searchText;
    public $placeholder ;
    public $admin ;
    public function mount($admin = false)
    {
        $this->admin = $admin;
    }

/*
     #[validate('required')]
     public $results = [];

    public function updatedSearchText($value)
    {
        $this->reset('results');

        $this->validate();

        $searchTerm = "%$value%";

        $this->results = Article::where('title', 'LIKE', $searchTerm)->get();
    }

 */

    #[On('search:clear')]
    public function clear() {
        $this->reset( 'searchText');
    }


    public function render()
    {
        return view('livewire.search' , [
            'results' => Article::where('title', 'LIKE', "%$this->searchText%")->get(),
        ]);
    }
}
