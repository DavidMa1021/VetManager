<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::join('clients', 'clients.id', '=', 'client_id')->select('pets.id', 'pets.name', 'pets.type', 'pets.client_id', 'clients.names', 'clients.lastnames')->get();

        return view('appointment.index', ['pets' => $pets]);
    }

    public function showAll()
    {
        // $appointments = Appointment::all();
        $appointments = Appointment::select(DB::raw("CONCAT('start_date','T','start_time') as start"), DB::raw("CONCAT('end_date','T','end_time') as end"), 'pet_id as title')->get();
        // dd($appointments);
        return response()->json($appointments);
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
        $request->validate(Appointment::$rules);
        $appointement = Appointment::create($request->all());
        return redirect()->route('appointments.index')->with('success', 'Cita registrada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $appointments = Appointment::all();
        $appointments = Appointment::join('pets', 'pets.id', '=', 'pet_id')->select(DB::raw("CONCAT(start_date,'T',start_time) as start"), DB::raw("CONCAT(end_date,'T',end_time) AS end"), 'pets.name as title', 'pet_id as id')->get();
        // dd($appointments);
        return response()->json($appointments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        return response()->json($appointment);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
