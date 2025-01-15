<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class articleForm extends Form
{
    public ?Article $article ;
    #[Locked]
    public int $id ;
    #[validate('required|min:3|max:100')]
    public $title = '';

    #[validate('required|min:10|max:500')]
    public $content = '';
    #[validate('required')]
    public $published = false;
    public $notifications = [];

    public $allowNotifications = false;
    #[validate('required|image|max:1024')]
    public $photo = '';

    public $photo_path = '';
    public function setArticle(Article $article)
    {
        $this->id = $article->id;
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published = $article->published;
        $this->notifications = $article->notifications ?? [];
        $this->allowNotifications = count($this->notifications) > 0;
        $this->photo_path = $article->photo_path;
        $this->article = $article;
    }



    public function store() {
        $this->validate();

        if(!$this->allowNotifications) {
            $this->notifications = [];
        }

        if($this->photo) {
            $this->photo_path = $this->photo->storePublicly('article_photos' , ['disk' => 'public']);
        }

        Article::create($this->all());
    }

    public function update() {
        $this->validate();

        if(!$this->allowNotifications) {
            $this->notifications = [];
        }

        if($this->photo) {
            $this->photo_path =  $this->photo->storePublicly('article_photos' , ['disk' => 'public']);
        }

        $this->article->update(
            $this->only(['title', 'content' , 'published' , 'notifications' , 'photo_path']),
        );
    }


}
