<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Component;

class ArticleIndex extends Component
{
    #[Title('Articles')]
    public function render()
    {
        return view('livewire.article-index' ,
        [
            'articles' => Article::all(),
        ]);
    }
}
