<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MaterielController extends Controller
{
    public function index(Request $request)
    {
        $materiels = Materiel::get()->sortBy('nom');
        return view('materiels', compact('materiels'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nom' => 'required',
            'prix' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $materiel = new Materiel;
        $materiel->nom = $request->nom;
        $materiel->prix = $request->prix;
        $materiel->save();

        $request->session()->flash('message', 'Materiel a bien été ajouté');
        return redirect('/materiels');

    }

    public function destroy($id)
    {
        $materiel = Materiel::find($id);
        $materiel->delete();
        Session::flash('message', 'Materiel a bien été supprimé'); 
        return redirect('/materiels');
    }

}
