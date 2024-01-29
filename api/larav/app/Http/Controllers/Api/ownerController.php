<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function list() {
        $owners = Owner::all();
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
            $owner = Owner::where('id', '=', $id)->first();
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
        public function create(Request $request) {
            $data = $request->validate([
                'name'=> 'required|min:3,max:20',
                'surname'=> 'required|min:3,max:20',
                'mail'=> 'required|min:3,max:20',
                'phone'=> 'required|min:3,max:20',
                'dob'=> 'required|min:3,max:20'

            ]);
            
            $owner = Owner::create([
                'name'=> $data['name'],
                'surname'=> $data['surname'],
                'mail'=> $data['mail'],
                'phone'=> $data['phone'],
                'dob'=> $data['dob']

            ]);
    
            if ($owner) {
                $object = [
    
                    "response" => 'Succes.Item saved correctly.',
                    "data" => $joint
        
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


            $data >request->validate([
                
                'id'=> 'required|inteher|min:1',
                'name'=> 'required|inteher|min:1',
                'surname'=> 'required|min:3,max:20',
                'mail'=> 'required|min:3,max:20',
                'phone'=> 'required|min:3,max:20',
                'dob'=> 'required|min:3,max:20'
            ]);
            $owner = Owner::where('id', '=', $id)->first();

            $owner->name = $data['name'];
            $owner->surname = $data['surname'];
            $owner->mail = $data['mail'];
            $owner->phone = $data['phone'];
            $owner->dob = $data['dob'];

            
            if ($owner) {
                $object = [
    
                    "response" => 'Succes.Item updated successfully.',
                    "data" => $owner
        
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

 
