<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Materiel;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index()
    {
        return view('stats');
    }


    
}
