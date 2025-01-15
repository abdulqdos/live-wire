<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PublishedCount extends Component
{
    #[Computed(cache: true,key: 'published-count')]

    public function count() {
        sleep(1);
        return Article::where('published',1)->count();
    }

    public function placeHolder() {
        return view('livewire.placeHolderMessage' , [
            'message' => 'Published loading ....',
        ]);
    }
    public function render()
    {
        return view('livewire.published-count');
    }
}
