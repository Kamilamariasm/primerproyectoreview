<?php

namespace App\Http\Controllers\Api;
use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller

{
    public function list() { 
        $comments = Comment::all();
    
        $commentsArray = $comments->map(function ($comment) {
            return [
                "id" => $comment->id,
                "opinion" => $comment->opinion,
                "user_id" => $comment->user_id,
                "review_id" => $comment->review_id
            ];
        });
    
        return response()->json($commentsArray);
    }
    
    public function item($id) {
        $comment = Comment::findOrFail($id);
    
        $object = [
            "id" => $comment->id,
            "opinion" => $comment->opinion,
            "user_id" => $comment->user_id,
            "review_id" => $comment->review_id
        ];
    
        return response()->json($object);
    }
            public function create(Request $request) {
                $data = $request->validate([
                    'opinion'=> 'required|min:3,max:20',
                    'review_id' => 'required|integer|min:1',


                ]);
                $user_id = Auth::id();
                $comment = Comment::create([
                    'opinion'=> $data['opinion'],
                    'review_id' => $data['review_id'],
                    'user_id' => $user_id,
                ]);
        
                if ($comment) {
                    $object = [
        
                        "response" => 'Succes.Item saved correctly.',
                        "data" => $comment
            
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
                        'opinion'=> 'required|min:3,max:20',
                        'review_id' => 'required|integer|min:1',
                    ]);
                    $comment = Comment::where('id', '=', $data['id'])->first();

                    $comment->opinion = $data['opinion'];
                  
                    
                    if ($comment->update()) {
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

