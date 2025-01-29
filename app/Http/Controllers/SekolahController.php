<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index(){
        $data = Sekolah::all();
        return view('sekolah.index', compact('data'));
    }

    public function create(){
        return view('sekolah.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        Sekolah::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('data.sekolah')->with('success', 'Data Sekolah Berhasil Ditambahkan');
    }
}
