<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserTable extends Component
{
    public function render()
    {
        return view('livewire.user-table', [
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
