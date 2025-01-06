<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ShowDashboardArticle  extends AdminComponent
{
    public $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }
    public function render()
    {
        return view('livewire.show-dashboard-article');
    }
}
