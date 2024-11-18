<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\client;
use App\Models\schedule;
use App\Models\searchCar;


class dbControl extends Controller
{
    public function getUsers()
    {
        // 데이터 조회
        $client = client::all();
        $schedule = schedule::all();
        $car = searchCar::all();
        
        // 조회 결과를 뷰로 전달s
        return view('index', [
            'clients' => $client,
            'schedules' => $schedule,
            'cars' => $car
        ]);
        
    }
    public function start()
    {
        // 데이터 조회
        $client = client::all();
        $schedule = schedule::all();
        $car = searchCar::all();

        // 조회 결과를 뷰로 전달s
        return view('tbox', [
            'clients' => $client,
            'schedules' => $schedule,
            'cars' => $car
        ]);
        
    }
    // public function searchCars()
    // {
    //     // 데이터 조회
    //     $car = searchCar::all();
       

    //     // 조회 결과를 뷰로 전달s
    //     return view('index', [
    //         'cars' => $car
            
    //     ]);
        
    // }
}
