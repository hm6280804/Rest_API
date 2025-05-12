<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = Student::find(1);
        // // dd($students);
        // return $students;
        // $students = Student::with('contact')->where('phone', 23456)->get();
        $students = Student::withWhereHas('contact', function($query){
            $query->where('phone', 23456);
        })->get();

        return $students;
        // echo $students->name . '<br>';
        // echo $students->contact->phone;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = new Student();
        $student->name = "hilal";
        $student->age = 45;
        // $student->city = 'Taxila';
        $student->save();
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
        //
    }
}
