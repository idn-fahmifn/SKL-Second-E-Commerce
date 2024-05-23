<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data_profile = Profile::where('id_user', auth()->user()->id)->get()->all();
        return view('home', compact('data_profile'));
    }
}
