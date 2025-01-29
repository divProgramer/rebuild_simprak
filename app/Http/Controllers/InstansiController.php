<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function index(){
        $data = Instansi::all();
        return view('instansi.index', compact('data'));
    }

    public function create(){
        return view('instansi.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:instansis,email',
            'alamat' => 'required'
        ]);

        Instansi::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('data.instansi')->with('success', 'Instansi Berhasil Ditambahkan');
    }
}
