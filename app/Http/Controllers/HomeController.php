<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\DtbHome;
use App\DtbUser;
use App\DtbIssue;
use App\DtbProject;
use App\IntStudent;
use App\DtbActivityLog;
use App\DtbDevelopGroup;
use App\DtbUsersProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['CheckAuthenticateUserMiddleware'])->except('basicSett');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {


        //redirect to login page with running visited page url; ### statt
        $visitedpage = $request->fullUrl();
        if (!Session()->has('user_id')) {
            return redirect('login')->with('url', $visitedpage);
        }
        //redirect to login page with running visited page url; ### end

        $userId = Session::get('user_id');
        $role = Session::get('role');
        $user_id = Session::get('user_id');
  
        $usersData = DtbUser::find($user_id);
        Session::put('users_name', $usersData->name);
        Session::put('users_image', $usersData->icon_image_path);

        $users = DtbUser::count();
        $groups = DB::table('groups')->count();

        return view('dashboard_main', compact('users' , 'groups'));

    }

    // home of project settings
    public function home()
    {
        //return view('dashboard');
    }

    public function settings(Request $request)
    {
        return view('dashboard');
    }

    public function test()
    {
        echo "hello world";
    }

}
