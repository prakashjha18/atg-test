<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\atgmail;
use Illuminate\Http\Request;
use App\atg_form;

class WebServicesController extends Controller
{
    public function getapi()
    {
    $items = atg_form::all();
    return response()->json($items);
    }
}
