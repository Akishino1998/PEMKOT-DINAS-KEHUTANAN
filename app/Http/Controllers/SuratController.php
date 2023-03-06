<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratController extends Controller
{
    function baru(){
        return view('surat.baru');
    }
    function semua(){
        return view('surat.semua');
    }
}
