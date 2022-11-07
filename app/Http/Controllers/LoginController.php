<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index'); 
    }

    public function show(Request $request)
    {
        $result = DB::select('select * from user_forum where email = :email', ['email' => $request->email]);
        
        if ($result == []) {
            return back()->withInput()->withErrors(['email' => 'Incorrect email']);
        }
        
        $user = $result[0];
        session(['user' => $user]);
        return redirect('post');
    }

    public function logout() {
        session()->forget('user');
        return redirect('post');
    }
}
