<?php

namespace App\Http\Controllers;

use App\Jobs\LoadObjectsJob;
use App\Models\Equipment;
use App\Models\EquipmentsCommand;
use Illuminate\Http\Request;

class PushController extends Controller
{
    //

    

    public function index(Request $request){

        $equipamento = Equipment::query()->where('serial' ,$request->get('deviceId'))->first();

        $comandEquipament = EquipmentsCommand::query()->where('equipament_id',$equipamento->id)->first();
        
        if($comandEquipament){

        }


        // return response()->json([
        //     "verb" =>  "POST",
        //     "endpoint" => "load_objects",
        //     "body" => [ "object" => "users" ],
        //     "contentType" => "application/json"
        // ]);


    }

    public function result(Request $request){

        $equipamento = Equipment::query()->where('serial' ,$request->get('deviceId'))->first();

        LoadObjectsJob::dispatch(json_decode($request->get('response')),$equipamento->school_id);
    }


}
