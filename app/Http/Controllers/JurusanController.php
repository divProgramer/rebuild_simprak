<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index(){
        $data = Jurusan::all();
        return view('jurusan.index', compact('data'));
    }

    public function create(){
        return view('jurusan.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
        ]);

        Jurusan::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('data.jurusan')->with('success', 'Jurusan Berhasil Ditambahkan');
    }
}
