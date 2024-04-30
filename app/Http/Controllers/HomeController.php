<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Jenis;
use App\Models\Pelanggan;

class HomeController extends Controller
{
    public function Home(){
        return view('layout.dashboard', [
            'title' => 'Home',
            'jumlahMenu' => Product::count(),
            'jumlahJenis' => Jenis::count(),
            'jumlahMember' => Pelanggan::count(),
        ]);
    }

    
}
