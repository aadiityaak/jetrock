<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;

class UserList extends Component
{
    public function render()
    {
        return view('livewire.user-list', [
            'users' => User::all(),
        ]);
    }
}
