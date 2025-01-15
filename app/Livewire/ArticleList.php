<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Session;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleList extends AdminComponent
{
    use withPagination;

    #[Title("Manage Articles")]
    public ?Article $article;

    // delete attr
    public $showDeleteModal = false;
    public $selectedArticle = null;

    // show published attr
    #[Session(key: 'Published')]
    public $published = false;

    // page name
    public $pageName = 'article-page';

    #[Computed]
    public function articles() {
        $articlesQuery = Article::query();

        if ($this->published) {
            $articlesQuery->where('published', 1);
        }

        return $articlesQuery->paginate(25, ['*'], $this->pageName);
    }

    public function delete(Article $article)
    {
        $this->selectedArticle = $article;
        $this->showDeleteModal = true;
    }

    public function confirmDelete()
    {
        if ($this->selectedArticle) {
            $this->selectedArticle->delete();
            session()->flash('success', 'Article Deleted successfully!');
            $this->showDeleteModal = false;
        }
    }

    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->selectedArticle = null;
    }

    public function togglePublished($published = false)
    {
        $this->published = $published;
        $this->resetPage($this->pageName);
    }


    public function closeSuccessMessage()
    {
        session()->forget('success');
    }

    public function render()
    {
        return view('livewire.article-list',);
    }

}
