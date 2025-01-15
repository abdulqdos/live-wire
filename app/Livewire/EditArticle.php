<?php

namespace App\Livewire;

use App\Livewire\Forms\articleForm;
use App\Models\Article;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditArticle extends AdminComponent
{
    use withFileUploads;
    public ?ArticleForm $form;

    public function mount(Article $article)
    {
        $this->form->setArticle($article);
    }

    public function downloadPhoto()
    {
        return response()->download(
            Storage::disk('public')->path($this->form->photo_path),
            'article.png'
        );
    }
    public function save()
    {
        $this->form->update();

        session()->flash('success', 'Article Updated successfully!');

        $this->redirect( ArticleList::class , navigate: true);
    }
    public function render()
    {
        return view('livewire.edit-article');
    }
}
