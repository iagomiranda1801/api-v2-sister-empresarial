<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Stancl\Tenancy\Facades\Tenancy;

class EquipamentController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenant = Tenant::find('nip');

        tenancy()->initialize($tenant);

        $equipaments = Equipment::all();
        return view('admin.pages.equipament.index', compact('equipaments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.equipament.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
