<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $test = Test::find(1);
        dd($test->meta_data);
        // return $test->meta_data;
        // return json_decode($test->meta_data, true);    //to get it as an array
        // return json_decode($test->meta_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $test = new Test();
        // $test->meta_data = [
        //     'name' => 'Muhammad Hanif',
        //     'email' => 'Hanif@gmail.com',
        //     'password' => 'hanif@123',
        // ];
        // $test->save();
        $test = Test::create([
            'meta_data' => [
                'name' => 'Muhammad Hamza',
                'email' => 'Hamza@gmail.com',
                'password' => 'Hamza@123',
            ]
        ]);
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
