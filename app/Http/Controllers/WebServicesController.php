<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\atgmail;
use Illuminate\Http\Request;
use App\atg_form;
use Illuminate\Support\Facades\Validator;
use App\Traits\reuse;

class WebServicesController extends Controller
{
    use reuse;
    public function getapi()
    {
        $items = atg_form::all();
        return response()->json($items);
    }
    public function postapi(Request $request)
    {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required|email|max:255|regex:/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/|unique:atg_form',
    //         'pincode' => 'required|max:6|min:6',
    //  ]);
    $validator = $this->validateFields($request);
 
 
     if ($validator->fails()) {
             return response()->json(['status' => '0', 'message' => $validator->messages()->all() ]);
     }
     else{
       
        // $name = $request->name;
        // $email = $request->email;
        // Mail::to($request->email)->send(new atgmail($name,$email));
        // $atg=new atg_form;
        // $atg->name=request('name');
        // $atg->email=request('email');
        // $atg->pincode=request('pincode');
        // $atg->save();
        $this->insertData($request);
       
       return response()->json(['status'=> '1','message'=>'your response has been recorded']);
     }
 
    }
}
