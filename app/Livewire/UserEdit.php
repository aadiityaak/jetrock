<?php

namespace App\Livewire;

use Livewire\Component;

class UserEdit extends Component
{
    public $name;
    public $email;
    public $alamat;
    public $id_karyawan;
    public function mount($user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->alamat = $user->alamat;
        $this->id_karyawan = $user->id_karyawan;
    }
    public function render()
    {
        return view('livewire.user-edit');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'alamat' => 'required|min:3',
            'id_karyawan' => 'required|integer',
        ], [
            'name.required' => 'Nama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'id_karyawan.required' => 'ID Karyawan harus diisi',
            'id_karyawan.integer' => 'ID Karyawan harus angka',
        ]);
        $this->user->update([
            'name' => $this->name,
            'alamat' => $this->alamat,
            'id_karyawan' => $this->id_karyawan,
        ]);
        redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }
}
