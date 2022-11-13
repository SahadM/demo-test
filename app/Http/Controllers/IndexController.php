<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        $request->session()->flash('message', 'Le materiel a bien été assigné au client');
        return redirect('/');
    }

    public function destroy($id)
    {
        \DB::table('pivot_client_materiel')
        ->where('lien_id', $id)
        ->delete();

        Session::flash('message', 'Le materiel a bien été soustrait au client'); 
        return redirect('/materiels');
    }

}
