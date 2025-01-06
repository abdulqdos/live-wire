<?php

use App\Livewire\ArticleIndex;
use App\Livewire\ArticleList;
use App\Livewire\CreateArticle;
use App\Livewire\Dashboard;
use App\Livewire\EditArticle;
use App\Livewire\Search;
use App\Livewire\ShowArticle;
use App\Livewire\ShowDashboardArticle;
use Illuminate\Support\Facades\Route;

Route::get('/', ArticleIndex::class)->name('article.index');
Route::get('/dashboard', Dashboard::class)->name('article.index');

Route::get('/article/{article}' , ShowArticle::class)->name('article');

// Admin side
Route::get('/dashboard/articles' , ArticleList::class)->name('article.list');
Route::get('/dashboard/article/create' , createArticle::class)->name('create-article');
Route::get('/dashboard/article/{article}' , ShowDashboardArticle::class)->name('dashboard-article');
Route::get('/dashboard/article/{article}/edit' , editArticle::class)->name('edit-article');
