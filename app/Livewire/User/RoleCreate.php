<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Role;

class RoleCreate extends Component
{
    public $name;
    public $description;

    public function render()
    {
        return view('livewire.user.role-create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|max:255|min:2',
            'description' => 'nullable',
        ], [
            'name.required' => 'Role Name wajib diisi',
            'name.max' => 'Role Name maksimal 255 karakter',
            'name.min' => 'Role Name minimal 3 karakter',
        ]);

        Role::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset();
        session()->flash('success', 'Role created successfully');
        return redirect()->route('users.role');
    }
}
