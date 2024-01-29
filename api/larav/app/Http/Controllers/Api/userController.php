<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list() {
        $users = User::all();
        $list =[];

            foreach($users as $user) {
                $object = [
                "id"=>$user->id,
                "name"=>$user->name,
                "surname" =>$user->surname,
                "mail" =>$user->mail,
                "phone" =>$user->phone,
                "password" =>$user->password,
                "image" =>$user->image,

                "created"=>$user->created_at,
                "updated"=>$user->updated_at
                ];
                array_push($list, $object);
            }
            return response()->json($list);
        }
        public function item($id) {
            $user = user::where('id', '=', $id)->first();
              $object =[
    
                "id"=>$user->id,
                "name"=>$user->name,
                "surname" =>$user->surname,
                "mail" =>$user->mail,
                "phone" =>$user->phone,
                "password" =>$user->password,
                "image" =>$user->image,

                "created"=>$user->created_at,
                "updated"=>$user->updated_at
                ];           
            
    
            return response()->json($object);
        }
        public function create(Request $request) {
            $data = $request->validate([
                'name'=> 'required|min:3,max:20',
                'surname'=> 'required|min:3,max:20',
                'mail'=> 'required|min:3,max:20',
                'phone'=> 'required|min:3,max:20',
                'password'=> 'required|min:3,max:20',
                'image'=> 'required|min:3,max:20'

            ]);
            
            $user = User::create([
                'name'=> $data['name'],
                'surname'=> $data['surname'],
                'mail'=> $data['mail'],
                'phone'=> $data['phone'],
                'password'=> $data['dob'],
                'dob'=> $data['dob']


            ]);
    
            if ($user) {
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
            'name'=> 'required|min:3,max:20',
            'surname'=> 'required|min:3,max:20',
            'mail'=> 'required|min:3,max:20',
            'phone'=> 'required|min:3,max:20',
            'password'=> 'required|min:3,max:20',
            'dob'=> 'required|min:3,max:20'


        ]);
        $user = Joint::where('id', '=', $id)->first();

        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->mail = $data['mail'];
        $user->phone = $data['phone'];
        $user->password = $data['password'];
        $user->dob = $data['dob'];
        
        
        if ($user) {
            $object = [

                "response" => 'Succes.Item updated successfully.',
                "data" => $user
    
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

