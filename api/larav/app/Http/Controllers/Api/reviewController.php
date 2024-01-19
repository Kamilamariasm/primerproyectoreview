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
                "joints_id  "=>$review->joints_id,
                "locations_id" =>$review->locations_id,
                "schedules_id" =>$review->schedules_id,
                "owners_id" =>$review->owners_id,
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
                "joints_id  "=>$review->joints_id,
                "locations_id" =>$review->locations_id,
                "schedules_id" =>$review->schedules_id,
                "owners_id" =>$review->owners_id,
                "image" =>$review->image,

                "created"=>$review->created_at,
                "updated"=>$review->updated_at
                ];           
            
    
            return response()->json($object);
                
    }
}
