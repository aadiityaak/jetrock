<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class Table extends Component
{

    public $name;
    public $email;
    public $password;
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

    public function store() 
    {
        $this->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'name.min' => 'Nama minimal 3 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset();
        session()->flash('success', 'User created successfully');
    }
}
