<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    

    public function store(Request $request){
        // dd($request);
        $request->validate([
            'names' => 'required',
            'lastnames' => 'required',
            'email' => 'required',
            'cellphone' => 'required|min:7',
            'id_number' => 'required'
        ]);

        $client = new Client;
        $client->names = $request->names;
        $client->lastnames = $request->lastnames;
        $client->email = $request->email;
        $client->cellphone = $request->cellphone;
        $client->id_number = $request->id_number;
        // dd($client);
        $client->save();

        return redirect()->route('newClient')->with('success', 'Cliente registrado con éxito');

    }

    public function index(){
        $clients = Client::all();
        return view('clients.index', ['clients' => $clients]);
    }

    public function show($id){

        $client = Client::find($id);
    
        return view('clients.show', ['client' => $client]);
    }

    public function update($id, Request $request ){
        $request->validate([
            'names' => 'required',
            'lastnames' => 'required',
            'email' => 'required',
            'cellphone' => 'required|min:7',
            'id_number' => 'required'
        ]);
        $client = Client::find($id);
        $client->names = $request->names;
        $client->lastnames = $request->lastnames;
        $client->email = $request->email;
        $client->cellphone = $request->cellphone;
        $client->save();
        return redirect()->route('newClient')->with('success', 'Datos del cliente actualizados con éxito');
    }


    public function delete($id){
        $client = CLient::find($id);
        $client->pets()->each(function($pet){
            $pet->appointments()->each(function($appointment){
                $appointment->delete();
            });
            $pet->delete();
        });
        $client->delete();
        return redirect()->route('newClient')->with('success', 'Cliente eliminado');
    }
}
