<?php

namespace App\Http\Controllers;

use App\Models\Dmr;
use App\Models\Elte;
use App\Models\Tetra;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $nombreTetras = Tetra::count();
        $nombreElte = Elte::count();
        $dmrCount = Dmr::count();
    
        return view('dashboard.index', compact('nombreTetras', 'nombreElte', 'dmrCount'));
    }
    

   
}
