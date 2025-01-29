<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurnalController extends Controller
{
    public function index(){
        $data = Jurnal::all();
        return view('jurnal.index', compact('data'));
    }

    public function create(){
        return view('jurnal.create');
    }

    public function store(Request $request){
        $request->validate([
            'pencapaian_akhir' => 'required',
            'bukti' => 'required|mimes:jpg,jpeg,png|max:2024',
        ]);

        $siswa = Siswa::where('user_id', Auth::id())->first();

        $data = Jurnal::create([
            'user_id' => auth()->id(),
            'instansi_id' => $siswa->instansi_id,
            'sekolah_id' => $siswa->sekolah_id,
            'catatan' => $request->pencapaian_akhir,
            'bukti' => $request->file('bukti')->store('bukti-jurnal'),
        ]);

        // Menyimpan file bukti jika ada
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $uniq = uniqid();
            $filename = date('mdY') . $uniq . '_' . $file->getClientOriginalName();

            // Menyimpan file ke storage
            $path = $file->storeAs('bukti', $filename, 'public');

            // Menyimpan path file ke database
            $data->update(['bukti' => $path]);
        }

        return redirect()->route('data.jurnal')->with('success', 'Jurnal Berhasil Ditambahkan');
    }
}
