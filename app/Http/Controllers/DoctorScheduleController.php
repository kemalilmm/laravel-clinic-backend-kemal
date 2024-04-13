<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $doctorSchedules = DoctorSchedule::with('doctor')->when($request->input('doctor_id'),function($query,$doctor_id){
            return $query->where('doctor_id',$doctor_id);
        })
        ->orderBy('id','desc')
        ->paginate(10);
        // $doctorSchedule->withQueryString();
        return view('pages.doctor_schedule.index', compact('doctorSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctorSchedule = DoctorSchedule::find($id);
        $doctorname = $doctorSchedule->doctor->doctor_name;
        $doctorSchedule->delete();
        return redirect()->route('doctor-schedules.index')->with('success', "Doctor $doctorname deleted successfully");
    }
}
