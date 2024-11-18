<?php

namespace App\Http\Controllers;
use App\Models\client;

class ClientController 
{
    public function get_client()
    {
        $client = client::all();

        return $client;   
    }
}