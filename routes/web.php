<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\CarSelectController;
use App\Http\Controllers\SendIdController;
use App\Http\Controllers\MonitoringVideoController;
use App\Http\Controllers\MonitoringMapController;
use App\Http\Controllers\ReplayMapController;
use App\Http\Controllers\ReplayVideoController;
use App\Http\Controllers\TripController;


//route에 사용된 URI의 이름과 js파일의 이름이 유사하므로 참고.

Route::get('/', [DefaultController::class, 'default']);
//최초 페이지가 로드될 때 

Route::get('/sendClientMonitor', [CarSelectController::class, 'car_select']);
//모니터링 모드에서 고객사를 고를 때 작동

Route::get('/searchMonitor', [CarSelectController::class, 'car_select']);
//모니터링 모드에서 고객사를 고르고 검색어를 입력해 폼을 제출할 때

Route::get('/sendCarIdtoMapfromMonitor', [MonitoringMapController::class, 'getPositions']);
//모니터링 모드에서 <tr>을 골라 [카카오 지도]로 carId를 전송

Route::get('/sendCarIdtoVideofromMonitor', [MonitoringVideoController::class, 'show_today_video']);
//모니터링 모드에서 <tr>을 골라 [Video]로 carId를 전송

Route::get('/sendCarIdfromMonitor', [SendIdController::class, 'search']);
//모니터링 모드에서 테이블 요소를 골라 carId 지정

Route::get('/sendTripDate', [TripController::class, 'trip_select']);
//모니터링모드->테이블선택->트립조회->시작/끝선택->제출
//그 후 트립테이블 출력
//send-TripDate.js




Route::get('/sendClientReplay', [CarSelectController::class, 'car_select']);
//리플레이 모드에서 고객사를 선택했을 때

Route::get('/searchReplay', [TripController::class, 'trip_select']);
//리플레이 모드-사이드바의 폼(고객사, 차번호, 달력)을 제출했을 때

Route::get('/sendCarIdVideofromTrip', [ReplayVideoController::class, 'show_trip_video']);
//트립조회에서 <tr>을 골라 video로 car_id, departure_time을 전달

Route::get('/sendCarIdMapfromTrip', [ReplayMapController::class, 'getPositions']);
//트립조회에서 <tr>을 골라 map으로 car_id, departure_time을 전달


Route::get('/set', function () {
    return view('setting');
});//php.info()
// Route::get('/client', [dbControl::class, 'getUsers']);

//test
// Route::get('/sendCarIdMapfromTrip', [SendClientController::class, 'search']);
// //트립조회에서 <tr>을 골라 map으로 car_id, departure_time을 전달
