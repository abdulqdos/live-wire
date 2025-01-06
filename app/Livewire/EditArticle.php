<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditArticle extends AdminComponent
{
    #[validate('required|min:3|max:100')]
    public $title = '';

    #[validate('required|min:10|max:500')]
    public $content = '';

    public function mount(Article $article)
    {
        $this->title = $article->title;
        $this->content = $article->content;
    }
    public function render()
    {
        return view('livewire.edit-article');
    }
}
