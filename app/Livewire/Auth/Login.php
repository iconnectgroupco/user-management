<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Login extends Component
{
    public $email;
    public $password;
    public $errorMessage = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function login()
    {
        $this->validate();

        $user = User::where('email', $this->email)->with('role')->first();

        if (!$user) {
            $this->errorMessage = 'No account found with this email address.';
            return;
        }

        if (!Hash::check($this->password, $user->password)) {
            $this->errorMessage = 'Incorrect password. Please try again.';
            return;
        }

        if (!$user->role) {
            $this->errorMessage = 'Your account is not properly configured. Please contact support.';
            return;
        }

        if (isset($user->status) && $user->status !== "1") {
            $this->errorMessage = 'Your account is inactive. Please contact support.';
            return;
        }

        Auth::login($user);

        if ($user->role->name === 'Admin') {
            return redirect()->route('admin.navigation');
        }

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
