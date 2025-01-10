<?php

namespace App\Livewire;

use App\Livewire\Forms\articleForm;
use App\Models\Article;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditArticle extends AdminComponent
{
    public ?ArticleForm $form;

    public function mount(Article $article)
    {
        $this->form->setArticle($article);
    }

    public function save()
    {
        $this->form->update();

        session()->flash('success', 'Article Updated successfully!');

        $this->redirect('/dashboard/articles' , navigate: true);
    }
    public function render()
    {
        return view('livewire.edit-article');
    }
}
