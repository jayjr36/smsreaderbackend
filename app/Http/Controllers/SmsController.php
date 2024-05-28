<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function receiveSms(Request $request){
        $request ->validate([
            "address"=> "required|string",
            "body"=>"required|string",
            "date"=>"required|date"
        ]);

        $message = Message::create([
            "from_number"=> $request -> address,
            "body"=> $request -> body,
            "date"=> $request -> date
        ]);

        return response()->json(['success' => true, 'message'=> 'sms stored successfully'],200);
    }
}
