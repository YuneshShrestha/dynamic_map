<?php

namespace App\Http\Controllers;

use App\Models\MapData;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $data = MapData::all();
        $encoded_data = json_encode($data);
        return $encoded_data;
    }
    public function item($id)
    {
        $data = MapData::where('id',$id)->get();
        $encoded_data = json_encode($data);
        return $encoded_data;
    }
}
