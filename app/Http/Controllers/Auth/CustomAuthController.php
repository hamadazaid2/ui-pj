<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    //

    public function adult(){
        return view('customAuth.adult');
    }

    public function notadult(){
        return view('customAuth.notadult');
    }
    public function admin()
    {
        return view('customAuth.admin');
    }

    public function site()
    {
        return view('customAuth.site');
    }
    public function adminLogin()
    {
        return view('auth.adminLogin');
    }
    public function checkAdminLogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->intended('/admin'); // intended('/admin') == route('auth.admin');
        }
        return back()->withInput($request->only('email'));
    }
}
