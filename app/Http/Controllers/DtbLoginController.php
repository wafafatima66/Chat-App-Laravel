<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Hash;
use Validator;
use App\DtbUser;

use App\VerifyUser;
use App\DtbActivityLog;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class DtbLoginController extends Controller
{
    
    public function login()
    {
        return view('auth.logins');
    }

    public function checkLogin(Request $request) {

        $email = $request->email;
        $password = md5($request->password);
        $results = DtbUser::select('dtb_users.*')->where('email', '=', $email)
        ->where('password', '=', $password)
        ->where('verified', '=', '1')
        ->first();

        if(!empty($results)){
            Session::put('user_id', $results->id);
            Session::put('email', $results->email);
            Session::put('english_name', $results->english_name);
            Session::put('role', $results->role);
            Session::put('users_image', $results->icon_image_path);
          
            
            // DtbActivityLog::updateActivityLog('logged in', 'application');


            //if found perviously visited page url 
            if(isset($request->prevurl)){
                return redirect($request->prevurl);
            }else{
                // return redirect('/home');

                return redirect('/home')->with('success', 'You have successfully logged in as '.$results->english_name);
            }
            
        }
        else{
            return redirect('/login')->with('message-danger', 'Incorrect username or password');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function makeRegister(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required' ,
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
        ]);

        $results = DtbUser::select('*')->where('email', '=', $request->email)->first();

        if(!empty($results)){
            return redirect('/register')->with('message-danger', 'Email Address already exists.');
        }
        else{
            $user = DtbUser::registration($request);
            \Mail::to($user->email)->send(new VerifyMail($user));
            return redirect('/register')->with('message-success', "We have sent a verification link to your given email address.Please Confirm it First.");
        }
    }

    public function verifyUser($token){
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
              $verifyUser->user->verified = 1;
              $verifyUser->user->save();
              $status = "Your e-mail is verified. You can now login.";
              return redirect()->route('email_confirm', array('already' => 'y'));
          } else {
              $status = "Your e-mail is already verified. You can now login.";
              return redirect()->route('email_confirm',array('already' => 'yy'));
          }
      } else {
        return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
    }
    return redirect('/login')->with('status', $status);
}

public function emailConfirm($already){
    return view('auth.email_verify', compact('already'));
}

public function destroy()
{
    if (!Session()->has('user_id')) {
        return redirect('login');
    }
    
    else{
        auth()->logout();
        Session::flush(); // destroy all set session variable
        // Session::forget('user_id'); // destroy by individual session variable
        return redirect()->to('/login');
    }
    
  }
}
