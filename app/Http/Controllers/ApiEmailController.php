<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\RegMail;

class ApiEmailController extends Controller
{
    // $to = [['email' => "fortnitelol402@gmail.com"];

    //
    // public function sendEmail(){
    //     $user = Auth::user();

    //     Mail::to("seifmahmoud871@gmail.com")->send(new RegMail($user->user_name));

    //     return back()->with('success', 'User Added successfully.');
    // }
}