<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function list() {
        $schedules = Schedule::all();
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
        $schedule = Schedule::where('id', '=', $id)->first();
          $object =[

                "id"=>$schedule->id,
                "day"=>$schedule->day,
                "hour"=>$schedule->hour,
                "created" => $schedule->created_at,
                "updated" => $schedule->updated_at
            ];           
        

        return response()->json($object);
    }
        public function create(Request $request) {
            $data = $request->validate([
                'day'=> 'required|min:3,max:20',
                'hour'=> 'required|min:3,max:20'
            ]);
            
            $schedule = Schedule::create([
                'day'=> $data['day'],
                'hour'=> $data['hour']
            ]);
    
            if ($schedule) {
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
                'day'=> 'required|min:3,max:20',
                'hour'=> 'required|min:3,max:20'
            ]);
            $schedule = Schedule::where('id', '=', $id)->first();

            $schedule->day = $data['day'];
            $schedule->hour = $data['hour'];
            
            
            if ($schedule) {
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


