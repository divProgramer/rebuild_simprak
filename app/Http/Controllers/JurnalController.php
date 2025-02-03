<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Jurnal;
use App\Models\Fasilitator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurnalController extends Controller
{
    public function index(){
        $user = Auth::user();
        $data = collect(); // Inisialisasi koleksi kosong

        switch ($user->role) {
            case 'siswa':
                // Ambil data jurnal untuk siswa yang login
                $siswa = Siswa::where('user_id', $user->id)->first();

                $data = Jurnal::where('user_id', $user->id)->get();
                break;

            case 'guru':
                // Ambil semua data jurnal
                $guru = Guru::where('user_id', $user->id)->first();
                $data = Jurnal::where('sekolah_id', $guru->sekolah_id)->get();
                break;

            case 'fasilitator':
                // Ambil data siswa berdasarkan kelompok_id fasilitator
                $fasilitator = Fasilitator::where('user_id', $user->id)->first();
                $siswa = Siswa::where('kelompok_id', $fasilitator->kelompok_id)->get();
                // Ambil data jurnal berdasarkan user_id dari siswa yang terkait
                $data = Jurnal::whereIn('user_id', $siswa->pluck('user_id'))->get();
                break;

            default:
                // Jika role tidak dikenali, redirect atau beri pesan error
                return redirect()->route('data.jurnal')->with('error', 'Akses tidak valid.');
        }

        // Tampilkan view dengan data yang sudah diambil
        return view('jurnal.index', compact(
            'data',
            'siswa'
        ));
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
            'status' => false,
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

    public function view($id){
        $data = Jurnal::find($id);
        return view('jurnal.view', compact('data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'status' => 'required',
            'catatan' => 'required',
        ]);

        $data = Jurnal::find($id);
        $data->update([
            'status' => $request->status,
            'pencapaian_akhir' => $request->catatan,
        ]);
        return redirect()->route('data.jurnal')->with('success', 'Jurnal Berhasil Diperbarui');
    }
}
