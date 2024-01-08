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


    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('success', 'Role deleted successfully');
        // return redirect()->route('users.role');
    }
}
