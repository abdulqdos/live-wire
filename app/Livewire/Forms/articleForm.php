<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Form;

class articleForm extends Form
{
    public ?Article $article ;
    #[validate('required|min:3|max:100')]
    public $title = '';

    #[validate('required|min:10|max:500')]
    public $content = '';


    public function setArticle(Article $article)
    {
        $this->title = $article->title;
        $this->content = $article->content;
        $this->article = $article;
    }


    public function store() {
        $this->validate();

        Article::create($this->all());
    }

    public function update() {
        $this->validate();

        $this->article->update(
            $this->only(['title', 'content']),
        );
    }


}
