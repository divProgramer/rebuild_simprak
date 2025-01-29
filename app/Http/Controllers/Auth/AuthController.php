<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    public function regis(){
        $jurusan = Jurusan::all();
        $sekolah = Sekolah::all();
        $guru = Guru::all();
        return view('auth.registrasi', compact('jurusan', 'sekolah', 'guru'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswas,nis',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'jurusan' => 'required',
            'sekolah' => 'required',
            'guru' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
            ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'siswa'
        ]);

        Siswa::create([
            'user_id' => $user->id,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jurusan_id' => $request->jurusan,
            'sekolah_id' => $request->sekolah,
            'guru_id' => $request->guru,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('login')->with('success', 'Berhasil registrasi silahkan untuk login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
