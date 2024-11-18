<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
//////////////////////////this is for test
//////////////////////////this is for test
//////////////////////////this is for test
//////////////////////////this is for test
//////////////////////////this is for test
class testController extends Controller
{
    public function search(Request $request)
    {
        $car_id = $request->input('car_id');
        $departure_time = $request->input('departure_time');
        

        // 데이터 처리 로직 (예: 데이터베이스에서 검색 등)

        $response = array(
            'car_id' => $car_id,
            'departure_time' => $departure_time,
            'message' => 'test done',
        );
        // echo $response;
        return response()->json($response);
    }

    public function replay_search(Request $request)
    {
        $client = $request->input('client');
        

        // 데이터 처리 로직 (예: 데이터베이스에서 검색 등)

        $response = array(
            'client' => $client,
            'message' => 'replay로부터 client 도착 완료',
        );
        // echo $response;
        return response()->json($response);
    }
}
?>