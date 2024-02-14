<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function list() {
        $reviews = Review::all();
        $list =[];

            foreach($reviews as $review) {
                $object = [
                "id"=>$review->id,
                "joint_id  "=>$review->joint_id,
                "location_id" =>$review->location_id,
                "schedule_id" =>$review->schedule_id,
                "owner_id" =>$review->owner_id,
                "image" =>$review->image,

                "created"=>$review->created_at,
                "updated"=>$review->updated_at
                ];
                array_push($list, $object);
            }
            return response()->json($list);
        }
    
    public function item($id) {
        $review = Review::where('id', '=', $id)->first();
          $object =[

            "id"=>$review->id,
            "joint_id"=>$review->joint_id,
            "location_id" =>$review->location_id,
            "schedule_id" =>$review->schedule_id,
            "owner_id" =>$review->owner_id,
            "image" =>$review->image,

            "created"=>$review->created_at,
            "updated"=>$review->updated_at
            ];           
        

        return response()->json($object);
    }
    public function create(Request $request) {
        $data = $request->validate([
            'joint_id'=> 'required|min:3,max:20',
            'location_id'=> 'required|min:3,max:20',
            'schedule_id'=> 'required|min:3,max:20',
            'owner_id'=> 'required|min:3,max:20',
            'image'=> 'required|min:3,max:20'

        ]);
        
        $review = Review::create([
            'joint_id'=> $data['joint_id'],
            'location_id'=> $data['location_id'],
            'schedule_id'=> $data['schedule_id'],
            'owner_id'=> $data['owner_id'],
            'image'=> $data['image']

        ]);

        if ($review) {
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
        'joint_id'=> 'required|min:3,max:20',
        'location_id'=> 'required|min:3,max:20',
        'schedule_id'=> 'required|min:3,max:20',
        'owner_id'=> 'required|min:3,max:20',
        'image'=> 'required|min:3,max:20'

    ]);
    $review = Review::where('id', '=', $data['id'])->first();

    $review->joint_id = $data['joint_id'];
    $review->location_id = $data['location_id'];
    $review->schedule_id = $data['schedule_id'];
    $review->owner_id = $data['owner_id'];
    $review->image = $data['image'];

    
    if ($review->save()) {
        $object = [

            "response" => 'Succes.Item updated successfully.',
            "data" => $review

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



