<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use App\Models\Tenant;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::query()->where(function ($query){
            if (request('search')){
                $query->where('name','like', '%' . request('search') . '%')
                ->orWhere('x_partner','like', '%' . request('search') . '%'); 
            }
        })->paginate(20);


        return response()->json(["message" => "sucess", "data" => $customers]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerCreateRequest $request)
    {

        $id = Str::lower(Str::random(3));

        if ($request->has('x_partner')) {
            $id = $request->input('x_partner');
        }

        $request->merge([
            'id_tenancy' => $id
        ]);


        $insert = Customer::query()->create($request->all());

        Tenant::query()->create(['id' => $id, 'plan' => 'free']);

        return response()->json(["message" => "sucess", "data" => $insert]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::query()->findOrFail($id);

        return response()->json(["message" => "success", "data" => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerUpdateRequest $request, string $id)
    {
        $customer = Customer::query()->findOrFail($id)->update($request->all());

        return response()->json(["message" => "success", "data" => $customer]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::query()->findOrFail($id)->delete();

        return response()->json(["message" => "success"]);
    }
}
