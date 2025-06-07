<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.user-index');
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
    public function show($foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($foto)
    {
        //
    }
}
