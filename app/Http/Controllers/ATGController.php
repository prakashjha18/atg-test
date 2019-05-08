<?php

namespace App\Http\Controllers;
use App\atg_form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\atgmail;

class ATGController extends Controller
{
    public function contactUS()
   {
       return view('contactUS');
   }
   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
   public function contactUSPost(Request $request)
   {
       $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|max:255|regex:/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/|unique:atg_form',
        'pincode' => 'required|max:6|min:6',
        ]);
       atg_form::create($request->all());
//        Mail::send('atgmail',
//        array(
//            'name' => $request->get('name'),
//            'email' => $request->get('email'),
//            'pincode' => $request->get('pincode')
//        ), function($message)
//    {
//        $message->from('saquib.gt@gmail.com');
//        $message->to('saquib.rizwan@cloudways.com', 'Admin')->subject('Cloudways Feedback');
//    });
    $name = $request->name;
    $email = $request->email;
    Mail::to($request->email)->send(new atgmail($name,$email));
       return back()->with('success', 'Thanks for contacting us!');
   }
   public function list()
   {
        $listings = atg_form::orderBy('created_at','asc')->get();
        return view('listings')->with('listings',$listings);
   }
}
