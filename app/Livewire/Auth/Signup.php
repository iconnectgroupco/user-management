<?php

namespace App\Livewire\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Signup extends Component
{
    public $name;
    public $email;
    public $role_id;
    public $contact_no;
    public $password;
    public $roles;
    public $errorMessage = '';

    public function signup()
    {
        // Validate inputs
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:12|regex:/^(?!.*\s).*$/', 
            'contact_no' => 'required|numeric|digits_between:10,15',
            'role_id' => 'required|exists:roles,id',
        ]);

        if (User::where('email', $this->email)->exists()) {
            $this->errorMessage = 'The email address is already taken.';
            return;
        }

        $userData = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'contact_no' => $this->contact_no,
            'role_id' => $this->role_id,
        ];

        try {
            User::create($userData);
            session()->flash('message', 'Account created successfully!');
        } catch (\Exception $e) {
            $this->errorMessage = 'An error occurred while creating the account. Please try again.';
        }
    }

    public function redirectToLogin()
    {
        return redirect()->route('authenticate');
    }

    public function render()
    {
        // Check if an Admin exists, and conditionally show roles
        $adminExists = User::whereHas('role', function ($query) {
            $query->where('name', 'Admin');
        })->exists();

        $this->roles = $adminExists
            ? Role::where('name', '!=', 'Admin')->get()
            : Role::all();
        
        return view('livewire.auth.signup');
    }
}
