<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ShowDashboardArticle  extends AdminComponent
{
    public $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function downloadPhoto()
    {
        return response()->download(
            Storage::disk('public')->path($this->article->photo_path),
            'article.png'
        );
    }
    public function render()
    {
        return view('livewire.show-dashboard-article');
    }
}
