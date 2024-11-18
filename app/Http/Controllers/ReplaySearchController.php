<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReplaySearchController extends Controller
{
    public function search(Request $request)
    {
        $client = $request->input('client');
        $carId = $request->input('car_id');
        $vnum = $request->input('vnum');
        $date = $request->input('from');
        

        // 데이터 처리 로직 (예: 데이터베이스에서 검색 등)

        $response = array(
            'client' => $client,
            'carId' => $carId,
            'vnum' => $vnum,
            'date' => $date,
            'message' => 'Replay mode 도착 완료',
        );
        // echo $response;
        return response()->json($response);
    }
}
?>