<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
                "email" =>$user->email,
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
            $user = User::where('id', '=', $id)->first();
              $object =[
    
                "id"=>$user->id,
                "name"=>$user->name,
                "surname" =>$user->surname,
                "email" =>$user->email,
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
                'email'=> 'required|min:3,max:20',
                'phone'=> 'required|min:3,max:20',
                'password'=> 'required|min:3,max:20',
                'image'=> 'required|min:3,max:20'

            ]);
            
            $user = User::create([
                'name'=> $data['name'],
                'surname'=> $data['surname'],
                'email'=> $data['email'],
                'phone'=> $data['phone'],
                'password'=> hash::make($data['password']),
                'image'=> $data['image']
            ]);
    
            if ($user) {
                $object = [
    
                    "response" => 'Succes.Item saved correctly.',
                    "data" => $user
        
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


        $data >$request->validate([

            'id'=> 'required|inteher|min:1',
            'name'=> 'required|min:3,max:20',
            'surname'=> 'required|min:3,max:20',
            'email'=> 'required|min:3,max:20',
            'phone'=> 'required|min:3,max:20',
            'password'=> 'required|min:3,max:20',
            'image'=> 'required|min:3,max:20'


        ]);
        $user = User::where('id', '=', $data['id'])->first();

        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = $data['password'];
        $user->image = $data['image'];
        
        
        if ($user->save()) {
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

