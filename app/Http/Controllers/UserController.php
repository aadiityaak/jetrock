<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update']);
    }

    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna dari model User
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required|in:admin,user,pm,pemilik,keuangan,finance,webmastercustom,webmasterbiasa,user,support,billing',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'role.in' => 'Role must be either "admin" or "user"',
            'role.required' => 'Role is required',
            'email.unique' => 'Email already exists',
            'email.required' => 'Email is required',
            'name.required' => 'Name is required',
            'name.max' => 'Name must be at most 255 characters',
            'email.max' => 'Email must be at most 255 characters',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Password confirmation does not match',
        ]);

        // Simpan pengguna
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Setelah berhasil menyimpan pengguna, arahkan kembali ke halaman detail pengguna
        return redirect()->route('users.show', $user->id)->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id), // Unique rule, mengabaikan pengguna saat ini
            ],
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:255',
            'tanggal_masuk' => 'nullable|string|max:255',
            'kode_karyawan' => 'nullable|string|max:255',
            'role' => 'required|in:admin,user,pm,pemilik,keuangan,finance,webmastercustom,webmasterbiasa,user,support,billing',
            'status' => 'required|in:active,inactive',
        ], [
            'role.in' => 'Role must be either "admin" or "user"',
            'role.required' => 'Role is required',
            'email.unique' => 'Email already exists',
            'email.required' => 'Email is required',
            'alamat.required' => 'Alamat is required',
            'no_hp.required' => 'No. HP is required',
            'tanggal_masuk.required' => 'Tanggal Masuk is required',
            'kode_karyawan.required' => 'Kode Karyawan is required',
            'name.required' => 'Name is required',
            'name.max' => 'Name must be at most 255 characters',
            'email.max' => 'Email must be at most 255 characters',
        ]);

        // Simpan perubahan
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'tanggal_masuk' => $request->input('tanggal_masuk'),
            'kode_karyawan' => $request->input('kode_karyawan'),
            'status' => $request->input('status'),
        ]);

        // Setelah berhasil menyimpan perubahan, arahkan kembali ke halaman detail pengguna
        return redirect()->route('users.show', $user->id)->with('success', 'User updated successfully');
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

}
