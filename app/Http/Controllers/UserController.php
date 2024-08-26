<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('templates.admin.user.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    public function userProfile()
    {
        $user = Auth::user();
        return view('templates.user.profile.index', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('templates.user.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login

        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'alamat' => 'nullable|string|max:255',
            'nomor_hp' => 'nullable|string|max:20',
        ]);

        // Update data pengguna
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->alamat = $request->input('alamat');
        $user->jenis_kelamin = $request->input('jenis_kelamin');
        $user->nomor_hp = $request->input('nomor_hp');
        $user->save();

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('user.profile.index')->with('success', 'Profil berhasil diperbarui.');
    }

}

