<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $doctors = Doctor::when($request->name, function ($query, $name) {
            return $query->where('doctor_name', 'like', "%$name%");
        })->orderBy('id', 'DESC')
            ->paginate(10);
        return view('pages.doctors.index', ['doctors' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_name'       => 'required',
            'doctor_email'      => 'required|email',
            'sip'               => 'required',
            'doctor_specialist' => 'required'
        ]);
        $doctor = new Doctor();
        $doctor->doctor_name          = $request->doctor_name;
        $doctor->doctor_email         = $request->doctor_email;
        $doctor->sip                  = $request->sip;
        $doctor->doctor_specialist    = $request->doctor_specialist;
        $doctor->save();
        return redirect()->route('doctor.index')->with('success', "Doctor {$request->name} inserted successfully");
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
        $doctor = Doctor::find($id);

        return view('pages.doctors.edit', ['doctor' => $doctor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'doctor_name'       => 'required',
            'doctor_email'      => 'required|email',
            'sip'               => 'required',
            'doctor_specialist' => 'required'
        ]);
        $doctor = Doctor::find($id);
        $doctor->doctor_name          = $request->doctor_name;
        $doctor->doctor_email         = $request->doctor_email;
        $doctor->sip                  = $request->sip;
        $doctor->doctor_specialist    = $request->doctor_specialist;
        if ($request->hasFile('photo')) {
        if (!empty($doctor->photo)) {
            Storage::delete($doctor->photo);
        }
        $path = $request->file('photo')->store('public/images');
        $doctor->photo = str_replace('public/', '', $path);
        }
        $doctor->save();
        return redirect()->route('doctor.index')->with('success', "Doctor {$request->name} updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::find($id);
        $doctorname = $doctor->doctor_name;
        $doctor->delete();
        return redirect()->route('doctor.index')->with('success', "Doctor $doctorname deleted successfully");
    }
}
