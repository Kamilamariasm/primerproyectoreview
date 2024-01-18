<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function list() {
        $schedules = schedule::all();
        $list =[];

            foreach($schedules as $schedule) {
                $object = [
                "id"=>$schedule->id,
                "day"=>$schedule->day,
                "hour" =>$schedule->hour,
                "created"=>$schedule->created_at,
                "updated"=>$schedule->updated_at
                ];
                array_push($list, $object);
            }
            return response()->json($list);
        }
    public function item($id) {
        $schedule = schedule::where('id', '=', $id)->first();
          $object =[

                "id"=>$schedule->id,
                "day"=>$schedule->day,
                "hour"=>$schedule->hour,
                "created" => $schedule->created_at,
                "updated" => $schedule->updated_at
            ];           
        

        return response()->json($object);
            
    }
}


