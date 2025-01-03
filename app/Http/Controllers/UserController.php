<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Tambahkan namespace untuk DomPDF

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['toko', 'role'])->get();
        return view('user.index', compact('users'));
    }

    public function destroy($id)
    {
        // Menghapus data user berdasarkan ID
        User::destroy($id);

        // Redirect dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function view()
    {
        return view('user.tambahpegawai');
    }

    public function generatePDF()
    {
        $users = User::with(['role', 'toko'])->where('id', '!=', 1)->get();
        $pdf = Pdf::loadView('user.pdf', compact('users'));

        return $pdf->download('Daftar_Pegawai.pdf');
    }
}
