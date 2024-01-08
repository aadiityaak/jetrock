<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Table extends Component
{

    public $roles = [
        'admin' => 'Administrator',
        'pemilik' => 'Pemilik',
        'pm' => 'Project Manager',
        'webmaster_custom' => 'Webmaster Custom',
        'webmaster_biasa' => 'Webmaster Biasa',
        'support' => 'Support',
        'revisi' => 'Revisi',
        'user' => 'User',
    ];
    
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
