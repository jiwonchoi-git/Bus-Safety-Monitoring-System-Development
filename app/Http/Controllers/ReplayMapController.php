<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dtg;

class ReplayMapController
{
    public function getPositions(Request $request)
    {
        $car_id = $request->input('car_id');
        $departure_time = $request->input('departure_time');
        
        $carPositions = $this->getPositionData($car_id, $departure_time);

        return response()->json(['formattedPositions' => $carPositions]);
    } 

    public function getPositionData($car_id, $departure_time)
    {
        $items_per_Page = 1000;
        $page = 0;
        $carPositions = [];
        $startDataFound = false;

        do {
            $dtg_list = dtg::where('car_id', $car_id)
                ->skip($page * $items_per_Page)
                ->take($items_per_Page)
                ->get();
    
            foreach ($dtg_list as $dtg) {
                if ($dtg->departure_time == $departure_time) {
                    $startDataFound = true; 
                    if ($dtg->position_x != 0) {
                        $carPositions[] = [
                            'position_x' => $dtg->position_x/1000000,
                            'position_y' => $dtg->position_y/1000000,
                        ];
                    }
                } elseif ($startDataFound) {
                    break 2;
                }
            } 
            $page++;
        } while (count($dtg_list) > 0);
    
        return $carPositions;
    }
}
?>