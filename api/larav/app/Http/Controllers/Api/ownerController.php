<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\owner;
use Illuminate\Http\Request;

class ownerController extends Controller
{
    public function list() {
        $owners = owner::all();
        $list =[];

            foreach($owners as $owner) {
                $object = [
                "id"=>$owner->id,
                "name"=>$owner->name,
                "surname" =>$owner->surname,
                "mail" =>$owner->mail,
                "phone" =>$owner->phone,
                "dob" =>$owner->dob,

                "created"=>$owner->created_at,
                "updated"=>$owner->updated_at
                ];
                array_push($list, $object);
            }
            return response()->json($list);
        }
        public function item($id) {
            $owner = owner::where('id', '=', $id)->first();
              $object =[
    
                "id"=>$owner->id,
                "name"=>$owner->name,
                "surname" =>$owner->surname,
                "mail" =>$owner->mail,
                "phone" =>$owner->phone,
                "dob" =>$owner->dob,

                "created"=>$owner->created_at,
                "updated"=>$owner->updated_at
                ];           
            
    
            return response()->json($object);
                
    }
}
