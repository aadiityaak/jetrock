<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $user_id;
    public $name;
    public $email;
    public $alamat;
    public $id_karyawan;
    public $no_hp;
    public $role;
    public $user;
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
    public function mount($user)
    {
        $this->user = $user;
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->alamat = $user->alamat;
        $this->id_karyawan = $user->id_karyawan;
        $this->no_hp = $user->no_hp;
        $this->role = $user->role;
    }
    public function render()
    {
        return view('livewire.user.edit');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'alamat' => 'nullable',
            'id_karyawan' => 'required|integer',
            'no_hp' => 'nullable',
            'role' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'id_karyawan.required' => 'ID Karyawan harus diisi',
            'id_karyawan.integer' => 'ID Karyawan harus angka',
            'role.required' => 'Role harus diisi',
        ]);
        User::where([
            'id' => $this->user->id
        ])->update([
            'name' => $this->name,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'id_karyawan' => $this->id_karyawan,
            'no_hp' => $this->no_hp,
            'role' => $this->role
        ]);

        redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }
}
