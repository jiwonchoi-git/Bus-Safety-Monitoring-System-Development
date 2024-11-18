<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MonitorSearchController extends Controller
{
    public function search(Request $request)
    {
        $client = $request->input('client');
        $vnum = $request->input('vnum');

        // 데이터 처리 로직 (예: 데이터베이스에서 검색 등)

        $response = array(
            'client' => $client,
            'vnum' => $vnum,
            'message' => '컨트롤러 도착 완료'
        );
        // echo $response;
        return response()->json($response);
    }
}
?>