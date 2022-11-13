<?php

namespace App\Http\Controllers;


use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::get()->sortBy('nom');
        return view('clients', compact('clients'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'code_postal' => 'required',
            'ville' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // format fields chars
        $client = new Client;
        $client->nom = strtoupper($request->nom);
        $client->prenom = ucfirst($request->prenom);
        $client->email = strtolower($request->email);
        $client->code_postal = $request->code_postal;
        $client->ville = strtoupper($request->ville);
        $client->save();

        $request->session()->flash('message', 'Le client a bien été ajouté');
        return redirect('/clients');

    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        Session::flash('message', 'Le client a bien été supprimé');
        return redirect('/clients');
    }

}
