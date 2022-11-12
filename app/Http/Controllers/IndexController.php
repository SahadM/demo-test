<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Materiel;
use Illuminate\Http\Request;


class IndexController extends Controller
{
      
    public function index()
    {
        $clients = Client::get()->sortBy('nom');
        $materiels = Materiel::get()->sortBy('nom');
        $table_lien = Client::with('materiels')->whereHas('materiels')->get();

        return view('index', compact('clients', 'materiels', 'table_lien'));

    }

    public function store(Request $request)
    {       
        $validator = \Validator::make($request->all(), [
            'client_id' => 'required',
            'materiel_id' => 'required',    
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $client = Client::find($request->client_id);
        $client->materiels()->attach($request->materiel_id);

        // return response()->json(['success'=>'Product added successfully']);
        return redirect('/');
    }

}
