<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Component;

class ArticleList extends AdminComponent
{
    #[Title("Manage Articles")]

    public ?Article $article;

    public function delete(Article $article) {
        $article->delete();

        session()->flash('success', 'Article Deleted successfully!');

        $this->redirect('/dashboard/articles' , navigate: true);
    }
    public function closeSuccessMessage()
    {
        session()->forget('success');
    }
    public function render()
    {
        return view('livewire.article-list' , [
            'articles' => Article::all(),
        ]);
    }
}
