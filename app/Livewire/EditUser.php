<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class EditUser extends Component
{
    public $userId;
    public $name;
    public $alamat;
    public $role;

    protected $listeners = ['userUpdated'];

    public function mount($userId)
    {
        $user = User::findOrFail($userId);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->alamat = $user->alamat;
        $this->role = $user->role;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'alamat' => 'required',
            'role' => 'required',
        ]);

        $user = User::findOrFail($this->userId);
        $user->update([
            'name' => $this->name,
            'alamat' => $this->alamat,
            'role' => $this->role,
        ]);

        $this->emit('userUpdated');
    }

    public function userUpdated()
    {
        // Reset form fields or perform any other necessary actions after update
        $this->reset();
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
