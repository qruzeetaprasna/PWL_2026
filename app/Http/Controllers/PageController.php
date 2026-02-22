<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return 'Selamat Datang';
    }
    public function about(){
        return 'Nama: Qruzeeta Prasna <br> NIM: 244107020084';
    }

    public function article($id){
        return 'Halaman Article dengan ID '. $id;
    }
}
