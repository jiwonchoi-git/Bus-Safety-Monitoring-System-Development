<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\replay_video;

class ReplayVideoController
{
    public function show_trip_video(Request $request)
    {

        $car_id = $request->input('car_id');
        $departure_time = $request->input('departure_time'); 

        $replay_videos = replay_video::where('car_id', $car_id ) 
                   ->where('departure_time', $departure_time) 
                   ->get();
        //return view('replayvideo',['replay_videos'=>$replay_videos]);  //로컬테스트용   
        return response()->json($replay_videos);
    }
}
?>