<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\location;
use Illuminate\Http\Request;

class locationController extends Controller
{
    
    public function list() {
        $locations = location::all();
        $list =[];

            foreach($locations as $location) {
                $object = [
                "id"=>$location->id,
                "neighborhood"=>$location->neighborhood,
                "street" =>$location->street,
                "postal" =>$location->postal,
                "image" =>$location->image,

                "created"=>$location->created_at,
                "updated"=>$location->updated_at
                ];
                array_push($list, $object);
            }
            return response()->json($list);
        }
    public function item($id) {
        $location = location::where('id', '=', $id)->first();
          $object =[

            "id"=>$location->id,
            "neighborhood"=>$location->neighborhood,
            "street" =>$location->street,
            "postal" =>$location->postal,
            "image" =>$location->image,

            "created"=>$location->created_at,
            "updated"=>$location->updated_at
            ];           
        

        return response()->json($object);
            
    }
}
