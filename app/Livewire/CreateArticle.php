<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Component;


class CreateArticle extends AdminComponent
{
    #[validate('required|min:3|max:100')]
    public $title = '';

    #[validate('required|min:10|max:500')]
    public $content = '';

    public function save()
    {
        $this->validate();

        Article::create($this->all());

        session()->flash('success', 'Article saved successfully!');

        $this->redirect('/dashboard/articles' , navigate: true);
    }
    public function render()
    {
        return view('livewire.create-article');
    }
}
