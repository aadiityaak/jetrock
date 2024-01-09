<?php

namespace App\Livewire\User;

use App\Models\Role;
use Livewire\Component;

class RoleTable extends Component
{
    public $name;
    public $description;

    public function render()
    {
        return view('livewire.user.role-table', [
            'roles' => Role::all(),
        ]);
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
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $this->name = $role->name;
        $this->description = $role->description;
    }

    public function update($id)
    {
        $role = Role::find($id);
        $role->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        session()->flash('success', 'Role updated successfully');
        // return redirect()->route('users.role');
    }

    public function destroy(Role $role)
    {
        // Cek apakah ada pengguna yang menggunakan role ini
        $usersWithRole = $role->users;

        if ($usersWithRole->count() > 0) {
            session()->flash('error', 'Tidak dapat menghapus role karena masih digunakan oleh pengguna.');
            return;
        }

        // Jika tidak ada pengguna yang menggunakan role, baru hapus
        $role->delete();
        session()->flash('success', 'Role deleted successfully');
    }
}
