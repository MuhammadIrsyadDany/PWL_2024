<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return 'Selamat Datang';
    }

    public function about()
    {
        return 'Nama: Muhammad Irsyad Dany | NIM: 2241720227';
    }

    public function articles($id)
    {
        return "Halaman Artikel dengan ID $id";
    }
}
