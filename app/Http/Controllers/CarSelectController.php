<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\schedule;
use App\Models\driver;

class CarSelectController
//모니터링 모드에서 고객사를 고를 때 작동 +
//모니터링 모드에서 고객사를 고르고 검색어를 입력해 제출할 때
{
    public function car_select(Request $request)
    {
        
        $client = $request->input('client'); //BIN
        $vnum = $request->input('vnum');    //검색어

        if ($client=='default'){
            $commonQuery = car::query()
            ->Where('VRN', 'like', '%' . $vnum . '%');
        } else{
            $commonQuery = car::where('BIN', $client)
            ->Where('VRN', 'like', '%' . $vnum . '%');
        }
        
    
        // 고객사 전체에서 다른 고객사를 고르고 난 후, 고객사 전체(default)를 고르면 작동 x
        $d = date('N'); 
        $DayOfWeek = $d % 7 + 1; // 일요일이 1로 시작되는 요일

        

        $car_id = $commonQuery->pluck('car_id');
        $car_status = $commonQuery->pluck('car_status');
        $VRN = $commonQuery->pluck('VRN');

        $driver_code = schedule::select('driver_code')
            ->whereIn('car_id', $car_id)
            ->where('trip_date', $DayOfWeek)
            ->pluck('driver_code');

        $driver_name = driver::select('driver_name')
            ->whereIn('driver_code', $driver_code)
            ->pluck('driver_name');
        
            return response()->json([
                'car_status' => $car_status,
                'VRN' => $VRN,
                'driver_name' => $driver_name,
                'car_id' => $car_id,
            ]);
    }
}
