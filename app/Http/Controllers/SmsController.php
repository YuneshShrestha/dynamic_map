<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function message(Request $request){
        
        Nexmo::message()->send([
            // 'to'=> '9779805332596',
            'to'=>'977'.$request->to,
            'from'=> '9779842064331',
            'text'=> 'Latitude:'.$request->latitude.' Longitude:'.$request->longitude,
        ]);
        echo 'sent';
       
    }
}
