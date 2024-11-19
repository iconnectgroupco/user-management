<?php

namespace App\Livewire\Admin;

use App\Models\Role;
use Livewire\Component;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class RoleManagement extends Component
{
    public $roles, $name, $slug, $status = '', $editRoleId, $deleteRoleId;
    public $role;

    public $showRoleNotification = false;
    public $showModal = false;
    public $showRoleEditModal = false;
    public $confirmDelete = false;

    public $notificationTitle = '';
    public $notificationMessage = '';

    public function render()
    {
        $this->roles = Role::withCount('users')->get();

        return view('livewire.admin.role-management');
    }


    public function addRole()
    {

        $this->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        // Generate slug in the backend
        $this->slug = Str::slug($this->name);

        Role::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
        ]);
        $this->roles = Role::withCount('users')->get();
        $this->showModal = false;

        $this->resetFields();
        $this->notify('Success', 'Role added successfully!');

    }


    public function viewRole($id)
    {
        $role = Role::findOrFail($id);

        $this->resetFields();

        $this->editRoleId = $role->id;
        $this->name = $role->name;
        $this->slug = $role->slug;
        $this->status = $role->status;

        $this->confirmDelete = false;

        $this->showRoleEditModal = true;
    }

    public function updateRole()
    {

        $role = Role::findOrFail($this->editRoleId);

        $this->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        $role->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'status' => $this->status,
        ]);

        $this->roles = Role::withCount('users')->get();
        $this->showRoleEditModal = false;
        $this->resetFields();

        $this->notify('Success', 'Role updated successfully!');

    }

    public function closeEditModal()
    {
        $this->resetFields();
        $this->showRoleEditModal = false;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }


    private function resetFields()
    {
        $this->roleId = '';
        $this->name = '';
        $this->slug = '';
        $this->status = '';
    }

    public function notify($title, $message)
    {
        $this->notificationTitle = $title;
        $this->notificationMessage = nl2br($message);
        $this->showRoleNotification = true;
    }
}