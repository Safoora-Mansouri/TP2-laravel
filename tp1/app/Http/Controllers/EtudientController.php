<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etudient;
use App\Models\Ville;

////////////////////////////////////////////////////////////

class etudientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { {
            // dd("ok");
            $etudients = Etudient::all();
            // dd($etudient);
            return view('etudients.index', compact('etudients'));
        }
    }
    //////////////////////////////////////////////////////////////
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudients.create', compact('villes'));
    }
    /////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {
        Etudient::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id
        ]);
        return redirect()->route('etudient.index');
    }

    /////////////////////////////////////////////////////////////////
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etudient $etudient)
    {
        return view('etudients.show', compact('etudient'));
    }
    ////////////////////////////////////////////////////////////////
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEtudient(Etudient $etudient)
    {
        return view('etudients.showEtudient', compact('etudient'));
    }
    //////////////////////////
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudient $etudient)
    {
        return view('etudients.edit', compact('etudient'));
    }
    ////////////////////////////////////////////////////////////////
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudient $etudient)
    {
        $etudient->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id
        ]);

        return redirect()->route('etudient.show', $etudient);
    }
    ////////////////////////////////////////////////////////////////////
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudient $etudient)
    {
        $etudient->delete();


        return redirect()->back();
    }
}
