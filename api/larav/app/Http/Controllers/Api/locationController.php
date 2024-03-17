<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    
    public function list() {
        $locations = Location::all();
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
        $location = Location::where('id', '=', $id)->first();
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

      public function create(Request $request) {
                $data = $request->validate([
                    'neighborhood'=> 'required|min:3,max:20',
                    'street'=> 'required|min:3,max:20',
                    'postal'=> 'required|min:3,max:20',
                    'image'=> 'required|min:3,max:20'
                ]);
                
                $location = Location::create([
                    'neighborhood'=> $data['neighborhood'],
                    'street'=> $data['street'],
                    'postal'=> $data['postal'],
                    'image'=> $data['image']
                ]);
        
                if ($location) {
                    $object = [
        
                        "response" => 'Succes.Item saved correctly.',
                        "data" => $location
            
                    ];
            
                    return response()->json($object);
                }else {
                    $object = [
        
                        "response" => 'Error:Something went wrong, please try again.',
            
                    ];
            
                    return response()->json($object);
                }
            }
            public function update(Request $request) {


                $data = $request->validate([

                    'id'=> 'required|integer|min:1',
                    'neighborhood'=> 'required|min:3,max:20',
                    'street'=> 'required|min:3,max:20',
                    'postal'=> 'required|min:3,max:20',
                    'image'=> 'required|min:3,max:20'
                ]);
                $location = Location::where('id', '=', $data['id'])->first();

                $location->neighborhood = $data['neighborhood'];
                $location->street = $data['street'];
                $location->postal = $data['postal'];
                $location->image = $data['image'];
                
                if ($location->save()) {
                    $object = [
        
                        "response" => 'Succes.Item updated successfully.',
                        "data" => $location
            
                    ];
            
                    return response()->json($object);
                }else {
                    $object = [
        
                        "response" => 'Error: Something went wrong, please try again.',
            
                    ];
            
                    return response()->json($object);
        
        
            }
    }
}

                
                

