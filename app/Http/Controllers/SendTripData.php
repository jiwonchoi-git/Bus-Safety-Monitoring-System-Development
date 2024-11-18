<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SendTripData extends Controller
{
    public function search(Request $request)
    {
        $car_id = $request->input('car_id');
        $fromdate = $request->input('from');
        $todate = $request->input('to');
        

        // 데이터 처리 로직 (예: 데이터베이스에서 검색 등)

        $response = array(
            'car_id' => $car_id,
            'fromdate' => $fromdate,
            'todate' => $todate,
            'message' => '날짜 선택 완료',
        );
        // echo $response;
        return response()->json($response);
    }
}
?>