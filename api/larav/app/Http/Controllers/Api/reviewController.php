<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\review;
use Illuminate\Http\Request;

class reviewController extends Controller
{
    public function list() {
        $reviews = review::all();
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
            $review = review::where('id', '=', $id)->first();
              $object =[
    
                "id"=>$review->id,
                "joint_id  "=>$review->joint_id,
                "location_id" =>$review->location_id,
                "schedule_id" =>$review->schedule_id,
                "owner_id" =>$review->owner_id,
                "image" =>$review->image,

                "created"=>$review->created_at,
                "updated"=>$review->updated_at
                ];           
            
    
            return response()->json($object);
                
    }
}
