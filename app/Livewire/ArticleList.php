<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Component;

class ArticleList extends AdminComponent
{
    #[Title("Manage Articles")]
    public function render()
    {
        return view('livewire.article-list' , [
            'articles' => Article::all(),
        ]);
    }
}
