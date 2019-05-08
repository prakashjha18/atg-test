<?php
namespace App\Traits;
use App\atg_form;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\atgmail;

trait reuse
{
    public function insertData($request) {
        $name = $request->name;
        $email = $request->email;
        Mail::to($request->email)->send(new atgmail($name,$email));
        $atg=new atg_form;
        $atg->name=request('name');
        $atg->email=request('email');
        $atg->pincode=request('pincode');
        $atg->save();
        Log::info('Mail sent!!!');

    }

    public function validateFields(Request $request) {
          $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|max:255|regex:/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/|unique:atg_form',
            'pincode' => 'required|max:6|min:6',
     ]);
      return $validator;
    }

}
