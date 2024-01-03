<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return inertia('User/Index', [
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return inertia('User/Show', [
            'user' => $user,
        ]);
    }

    public function create()
    {
        // Tampilkan form pembuatan pengguna
        return inertia('User/Create');
    }

    public function store(Request $request)
    {
        // Validasi data input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            // tambahkan aturan validasi sesuai kebutuhan
        ]);

        // Simpan pengguna baru ke database
        User::create($validatedData);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Tampilkan form edit pengguna
        return inertia('User/Edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi data input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            // tambahkan aturan validasi sesuai kebutuhan
        ]);

        // Update data pengguna di database
        $user = User::findOrFail($id);
        $user->update($validatedData);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus pengguna dari database
        User::destroy($id);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
