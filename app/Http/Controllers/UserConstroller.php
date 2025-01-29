<?php

namespace App\Http\Controllers;

use App\Models\Fasilitator;
use App\Models\Guru;
use App\Models\Instansi;
use App\Models\Kelompok;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class UserConstroller extends Controller
{
    // Siswa
    public function siswa(Request $request){
        $data = Siswa::all();
        return view('user.siswa', compact('data'));
    }

    public function edit($id){
        $data = Siswa::find($id);
        $kelompok = Kelompok::all();
        $instansi = Instansi::all();

        return view('user.update.siswa', compact('data', 'kelompok', 'instansi'));
    }

    public function update(Request $request, $id){
        $data = Siswa::find($id);
        $request->validate([
            'instansi' =>'required',
            'kelompok' => 'required'
        ]);

        $data->update([
            'instansi_id' => $request->instansi,
            'kelompok_id' => $request->kelompok
        ]);

        return redirect()->route('data.siswa')->with('success', 'Data siswa berhasil diupdate');
    }

    // Fasilitator
    public function fasilitator(Request $request){
        $data = Fasilitator::all();
        return view('user.fasilitator', compact('data'));
    }

    public function fasilitatorCreate(Request $request){
        // $user = User::where('role', 'fasilitator')->get();
        $instansi = Instansi::all();
        $kelompok = Kelompok::all();
        return view('user.create.fasilitator', compact('instansi', 'kelompok'));
    }

    public function fasilitatorStore(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'kelompok' => 'required',
            'instansi' => 'required',
            'password' => 'required',
            'nim' => 'required|regex:/^[0-9]+$/',
            'no_hp' => 'required',
            'alamat' => 'required',

        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'fasilitator',
        ]);

        $fasilitator = Fasilitator::create([
            'user_id' => $user->id,
            'instansi_id' => $request->instansi,
            'Kelompok_id' => $request->kelompok,
            'nama' => $request->nama,
            'nim' => $request->nim,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('data.fasilitator')->with('success', 'Data Berhasil Ditambahkan');
    }

    // guru
    public function guru(Request $request){
        $data = Guru::all();
        return view('user.guru', compact('data'));
    }

    public function guruCreate(){
        $sekolah = Sekolah::all();
        return view('user.create.guru', compact('sekolah'));
    }

    public function guruStore(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'nip' => 'required|regex:/^[0-9]+$/',
            'no_hp' => 'required',
            'alamat' => 'required',
            'sekolah' => 'required',

        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'guru',
        ]);

        $fasilitator = Guru::create([
            'user_id' => $user->id,
            'sekolah_id' => $request->sekolah,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('data.guru')->with('success', 'Data Guru Berhasil di Tambahkan');
    }
}
