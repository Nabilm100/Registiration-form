<?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Redirect;


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Mail\RegMail;
class AuthController extends Controller
{
    public function signup(){
        return view('signup');
    }

    public function signupPost(Request $request){

        $request->validate([
            'full_name'          =>  'required',
            'user_name'          =>  'required|unique:users',
            'phone'          =>  'required',
            'birthdate'          =>  'required|date|before:' . date('Y-m-d', strtotime('-18 years')),
            'address'          =>  'required',
            'password'          =>  [
                'required',
                'min:8',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            ],
            'confirm_password' => 'required|same:password',
            'email'         =>  'required|email|unique:users',
            'user_image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $file_name = time() . '.' . request()->user_image->getClientOriginalExtension();

        request()->user_image->move(public_path('images'), $file_name);

        $user = new User;
        
        $user->full_name = $request->full_name;
        $user->user_name = $request->user_name;
        $user->birthdate = $request->birthdate;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->user_image = $file_name;

        
        // {{route('sendEmail')}}
        Mail::to($request->email)->send(new RegMail($request->full_name));
        $user->save();
        return back()->with('success', 'User Added successfully.');
   
    }

    public function login(){
        return view('login');
    }
    

    public function loginPost(Request $request){
        // $credentials = [
        //     'user_name' => $request->user_name,
        //     'password' => $request->password,
        // ];
        // // dd($credentials);
        // if(Auth::attempt($credentials)){
        //     return redirect()->route('home')->with('success',`Welcome $rerequest->user_name`);
        // }
        
        $request->validate([
            'user_name' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('user_name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/home')->with('success',`Welcome $request->user_name`);
        }

        return back()->with('error', 'Incorrect Email or Password');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}