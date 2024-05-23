<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'nomor_hp' => 'required|max:15|min:10',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'foto_profile' => 'required|mimes:png,jpg,jpeg,heic',
            'alamat' => 'required',
        ]);
        if($validasi->fails())
        {
            return back()->withErrors($validasi)->withInput();
        }

        if($request->hasFile('foto_profile'))
        {
            $folder = "public/image/profile"; // Membuat Folder Penyimpanan
            $gambar = $request->file('foto_profile'); // Mengambil Data Dari Request File
            $nama_gambar = $gambar->getClientOriginalName(); // Mengambil Nama File
            $path = $request->file('foto_profile')->storeAs($folder, $nama_gambar); // Menyimpan File
            $data['foto_profile'] = $nama_gambar; // Memberi Nama Yang Dikirim Ke Database
        }

        Profile::create($data); 
        return back();
    }

    public function show(Profile $profile)
    {
        //
    }

    public function edit(Profile $profile)
    {
        //
    }

    public function update(Request $request, Profile $profile)
    {
        //
    }

    public function destroy(Profile $profile)
    {
        //
    }
}
