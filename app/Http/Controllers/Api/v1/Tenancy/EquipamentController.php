<?php

namespace App\Http\Controllers\Api\v1\Tenancy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Equipment;

class EquipamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Equipment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Equipment::query()->create($request->all());

        return response()->json('Equipamento cadastrado com sucesso!', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
