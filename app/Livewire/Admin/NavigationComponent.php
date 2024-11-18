<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class NavigationComponent extends Component
{
    public $currentView = 'user-management';

    protected $listeners = ['recordUpdated' => 'showMessage'];

    public function switchView($view)
    {
        $this->currentView = $view; 
    }

    public function render()
    {
        return view('livewire.admin.navigation-component')->layout('layouts/app');
    }
}