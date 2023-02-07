<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pets = Pet::all();
        $pets = Pet::join('clients','clients.id','=','client_id')->select('pets.id','pets.name','pets.type','pets.client_id','clients.names','clients.lastnames')->get();
        $clients = Client::all();
        
        return view('pets.index', ['pets' => $pets, 'clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'owner' => 'required'

        ]);
        

        $pet = new Pet;
        $pet->name = $request->name;
        $pet->type = $request->type;
        $pet->client_id = $request->owner;
        $pet->save();

        return redirect()->route('pets.index')->with('success','Mascota registrada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $pet = Pet::find($id);
    
        return view('pets.show', ['pet' => $pet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required',
            'type' => 'required'

        ]);

        $pet = Pet::find($id);
        $pet->name = $request->name;
        $pet->type = $request->type;
        $pet->save();

        return redirect()->route('pets.index')->with('success','Datos de mascota actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pet = Pet::find($id);
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Registro de mascota eliminado');
    }
}
