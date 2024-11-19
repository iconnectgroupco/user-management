<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class AuthSwitcher extends Component
{
    public $showSignup = false;

    public function switchToSignup()
    {
        $this->showSignup = true;
    }

    public function switchToLogin()
    {
        $this->showSignup = false;
    }

    public function render()
    {
        return view('livewire.auth.auth-switcher')->layout('layouts.app');
    }
}