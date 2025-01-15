<?php

namespace App\Livewire;

use App\Livewire\Forms\articleForm;
use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;


class CreateArticle extends AdminComponent
{
    use withFileUploads;
    public ?ArticleForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('success', 'Article Created successfully!');

        $this->redirectRoute( 'dashboard.articles.list' , navigate: true);
    }
    public function render()
    {
        return view('livewire.create-article');
    }
}
