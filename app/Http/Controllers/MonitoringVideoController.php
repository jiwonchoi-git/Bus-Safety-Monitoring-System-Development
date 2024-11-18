<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\monitoring_video;

class MonitoringVideoController
{
    public function show_today_video(Request $request)
    {
        $d = date(3); 
        $DayOfWeek = $d % 7 + 1; // 일요일이 1로 시작되는 요일

        $car_id = $request->input('car_id'); 
        
        $monitoring_videos = monitoring_video::where('car_id', $car_id) 
                   ->where('trip_date', $DayOfWeek)
                   ->get();
                   
        return response()->json($monitoring_videos);
    }
}
?>