<?php

namespace App\Livewire;

use App\Livewire\Forms\articleForm;
use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Component;


class CreateArticle extends AdminComponent
{
    public ?ArticleForm $form;

    public function save()
    {

        $this->form->store();

        session()->flash('success', 'Article Created successfully!');

        $this->redirect('/dashboard/articles' , navigate: true);
    }
    public function render()
    {
        return view('livewire.create-article');
    }
}
