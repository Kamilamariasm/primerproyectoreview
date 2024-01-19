<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\joint;
use Illuminate\Http\Request;


class jointController extends Controller
{
    public function list() {
        $joints = joint::all();
        $list =[];

            foreach($joints as $joint) {
                $object = [
                "id"=>$joint->id,
                "stand"=>$joint->stand,
                "opinions" =>$joint->opinions,
                "consumption" =>$joint->consumption,
                "profiles" =>$joint->profiles,

                "created"=>$joint->created_at,
                "updated"=>$joint->updated_at
                ];
                array_push($list, $object);
            }
            return response()->json($list);
        }
        public function item($id) {
            $joint = joint::where('id', '=', $id)->first();
              $object =[
    
                "id"=>$joint->id,
                "stand"=>$joint->stand,
                "opinions" =>$joint->opinions,
                "consumption" =>$joint->consumption,
                "profiles" =>$joint->profiles,

                "created"=>$joint->created_at,
                "updated"=>$joint->updated_at
                ];           
            
    
            return response()->json($object);
                
    }
}

