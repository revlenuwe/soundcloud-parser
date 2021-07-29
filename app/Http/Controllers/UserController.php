<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function tracks(){
        $tracks = auth()->user()->tracks;

        return view('user_library', compact('tracks'));
    }
}
