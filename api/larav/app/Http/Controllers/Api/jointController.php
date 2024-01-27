<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Joint;
use Illuminate\Http\Request;


class JointController extends Controller
{
    public function list() {
        $joints = Joint::all();
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
            $joint = Joint::where('id', '=', $id)->first();
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
            public function create(Request $request) {
                $data = $request->validate([
                    'stand'=> 'required|min:3,max:20',
                    'opinions'=> 'required|min:3,max:20',
                    'consumption'=> 'required|min:3,max:20',
                    'profiles'=> 'required|min:3,max:20'
                ]);
                
                $joint = Joint::create([
                    'stand'=> $data['stand'],
                    'opinions'=> $data['opinions'],
                    'consumption'=> $data['consumption'],
                    'profiles'=> $data['profiles']
                ]);
        
                if ($joint) {
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
                        'stand'=> 'required|min:3,max:20',
                        'opinions'=> 'required|min:3,max:20',
                        'consumption'=> 'required|min:3,max:20',
                        'profiles'=> 'required|min:3,max:20'
                    ]);
                    $joint = Joint::where('id', '=', $id)->first();

                    $joint->stand = $data['stand'];
                    $joint->opinions = $data['opinions'];
                    $joint->consumption = $data['consumption'];
                    $joint->profiles = $data['profiles'];
                    
                    if ($joint) {
                        $object = [
            
                            "response" => 'Succes.Item updated successfully.',
                            "data" => $joint
                
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
