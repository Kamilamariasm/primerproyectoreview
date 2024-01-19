<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list() {
        $users = user::all();
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
}
