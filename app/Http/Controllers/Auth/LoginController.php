<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!auth()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            return redirect()->back()->with('error', 'Invalid Login');
        }

        return redirect()->route('dashboard');
    }
}
