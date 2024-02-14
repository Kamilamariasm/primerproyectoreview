<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller

{
    public function list() {
        $comments = Comment::all();
        $list =[];

            foreach($comments as $comment) {
                $object = [
                "id"=>$comment->id,
                "opinion"=>$comment->opinion,
                "user_id" =>$comment->user_id,
            

                "created"=>$comment->created_at,
                "updated"=>$comment->updated_at
                ];
                array_push($list, $object);
            }
            return response()->json($list);
        }
        public function item($id) {
            $comment = Comment::where('id', '=', $id)->first();
              $object =[
    
                "id"=>$comment->id,
                "opinion"=>$comment->opinion,
                "user_id" =>$comment->user_id
                
                ];           
            
    
            return response()->json($object);
        }
            public function create(Request $request) {
                $data = $request->validate([
                    'opinion'=> 'required|min:3,max:20',
                    'user_id'=> 'required|min:3,max:20'
                ]);
                
                $comment = Comment::create([
                    'opinion'=> $data['opinion'],
                    'user_id'=> $data['user_id']
                ]);
        
                if ($comment) {
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


                    $data >$request->validate([

                        'id'=> 'required|inteher|min:1',
                        'opinion'=> 'required|min:3,max:20',
                        'user_id'=> 'required|min:3,max:20'
                    ]);
                    $comment = Comment::where('id', '=', $data['id'])->first();

                    $comment->opinion = $data['opinion'];
                    $comment->user_id = $data['user_id'];
                  
                    
                    if ($comment->save()) {
                        $object = [
            
                            "response" => 'Succes.Item updated successfully.',
                            "data" => $comment
                
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

