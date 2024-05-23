<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $toko = Toko::all();
        $user = User::all();
        return view('toko.index', compact('toko','user'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();
        //  validator
        $validasi = Validator::make($input,[
            'nama_toko' => 'required|max:128|min:5|string',
            'desc_toko' => 'required',
            'kategori_toko' => 'required',
            'hari_buka' => 'required',
            'jam_buka' => 'required',
            'jam_libur' => 'required',
            'icon_toko' => 'required|mimes:jpeg, jpg, png, svg',
        ]);
        if($validasi->fails())
        {
            return back()->withErrors($validasi)->withInput();
        }
        // input untuk hari 
        // gambar icon toko
        if($request->hasFile('icon_toko'))
        {
            $folder = "public/image/toko";
            $gambar = $request->file('icon_toko');
            $nama_gambar = $gambar->getClientOriginalName(); 
            $path = $request->file('icon_toko')->storeAs($folder, $nama_gambar);
            $input['icon_toko'] = $nama_gambar; 
        }

        // konversi nilai array ke dalam string : 
        $hari = implode(',', $request->input('hari_buka'));
        $input['hari_buka'] = $hari;

        Toko::create($input);
        return back();
    }

    public function show($id)
    {
        $data = Toko::find($id);
        return view('toko.detail', compact('data'));
    }

    public function edit(Toko $toko)
    {
            //
    }

    public function update(Request $request, Toko $toko)
    {
        //
    }
    
    public function destroy(Toko $toko)
    {
        //
    }
}
