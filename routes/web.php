<?php

use App\Livewire\ArticleIndex;
use App\Livewire\ArticleList;
use App\Livewire\CreateArticle;
use App\Livewire\Dashboard;
use App\Livewire\EditArticle;
use App\Livewire\Login;
use App\Livewire\Logout;
use App\Livewire\Search;
use App\Livewire\ShowArticle;
use App\Livewire\ShowDashboardArticle;
use App\Livewire\Signup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Auth
Route::get('/login', Login::class )->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
} )->name('logout');


Route::get('/signup', signup::class )->name('signup');
Route::get('/', ArticleIndex::class)->name('home');
Route::get('/article/{article}' , ShowArticle::class)->name('article.show');


// Admin side
Route::middleware([
    'auth'
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard.articles.index');
    Route::get('/dashboard/articles' , ArticleList::class)->name('dashboard.articles.list');
    Route::get('/dashboard/article/create' , createArticle::class)->name('dashboard.articles.create');
    Route::get('/dashboard/article/{article}' , ShowDashboardArticle::class)->name('dashboard.articles.show');
    Route::get('/dashboard/article/{article}/edit' , editArticle::class)->name('dashboard.articles.edit');
});
