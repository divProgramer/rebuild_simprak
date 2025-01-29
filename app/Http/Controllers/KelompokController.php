<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use Illuminate\Http\Request;

class KelompokController extends Controller
{
    public function index(){

        $data = Kelompok::all();
        return view('kelompok.index', compact('data'));
    }

    public function create(){
        return view('kelompok.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
        ]);

        Kelompok::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('data.kelompok')->with('success', 'Kelompok Berhasil Ditambahkan');
    }

}
