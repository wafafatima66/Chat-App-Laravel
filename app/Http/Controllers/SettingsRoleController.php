<?php

namespace App\Http\Controllers;

use App\Module;
use App\ModulePermission;
use App\MtbRole;
use Illuminate\Http\Request;

class SettingsRoleController extends Controller
{
    public function index()
    {
        $settingRoles = MtbRole::all();
        return view('settings.roles.index',compact('settingRoles'));
    }

    public function assignPermission($id)
    {
       
        $modules = ModulePermission::where('role_id',$id)->get();
        $roleFor = MtbRole::find($id);
        return view('settings.roles.assign_permission',compact('modules','roleFor'));
    }

    public function modulePermission(Request $request)
    {
        // dd($request->all());
        ModulePermission::where('role_id',$request->id)->update(['permission'=>0]);
        $role_id = $request->role_id;
        $modulePermission = ModulePermission::whereIn('id',$request->permissions)->update(['permission' => 1]);
        return redirect()->back()->with('message-success','Permission Assigned Successfully');
    }
}
