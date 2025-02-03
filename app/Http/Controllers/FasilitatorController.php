<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Fasilitator;
use App\Models\User;
use Illuminate\Http\Request;

class FasilitatorController extends Controller
{
    public function index(){
        $fasilitator = Fasilitator::where('user_id', auth()->user()->id)->first();
        $data = Siswa::where('kelompok_id', $fasilitator->kelompok_id)->get();
        return view('user.fasilitator.siswa', compact('data', 'fasilitator'));
    }

    public function view($id){
        $data = Siswa::find($id);
        $user = User::find($data->user_id);
        return view('user.fasilitator.viewS', compact('data', 'user'));
    }
}
