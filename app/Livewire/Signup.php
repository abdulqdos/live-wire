<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Signup extends Component
{
    #[validate('required|string')]
    public $name;

    #[validate('required|email')]
    public $email = '';

    #[validate('required|min:4|max:12')]
    public $password = '';

    public function signUp()
    {
        $data = $this->validate();


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user'
        ]);


        Auth::login($user);

        session()->flash('success', 'congratulations! you account has been created.');

        $this->redirect( ArticleIndex::class , navigate: true );
    }
    public function render()
    {
        return view('livewire.signup');
    }
}
