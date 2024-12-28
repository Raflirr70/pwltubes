<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with(['toko', 'role'])->get();
        
        return view('user.index', compact('users'));
    }
    public function destroy($id){
        // Menghapus data user berdasarkan ID
        User::destroy($id);

        // Redirect dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
