<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class Table extends Component
{

    public $roles;

    public function __construct()
    {
        $this->roles = Role::all();
    }
    
    public function render()
    {
        return view('livewire.user.table', [
            'users' => User::orderBy('id', 'desc')->get(),
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        session()->flash('success', 'User deleted successfully');
    }

}
