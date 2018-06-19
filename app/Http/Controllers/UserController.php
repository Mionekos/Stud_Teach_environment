<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function registrationForUser(Request $request){
        $email = $request->post("email");
        $user_email = User::where('email', $email)->first();
        if (is_null($user_email)) {
            $user = \App\User::create(["lastname" => $request->post('lastname'), "name" => $request->post('name'),
                "patronymic" => $request->post('patronymic'), "birthday" => date("Y.m.d", strtotime($request->post('birthday'))),
                "gender" => $request->post('gender'), "email" => $request->post('email_reg'),
                "login" => $request->post('login_reg'),
                "password" => Hash::make($request->post('password_reg')),
                "group_id" => $request->post('group_name'),
                "role_id" =>3]);
            Auth::login($user);
            return redirect("/cabinet" . Auth::user()->id);
        } else {
            //return response()->json(["error" => "user exist"]);
        }
    }

    protected function loginForUser(Request $request)
    {
        $credentials = [
            "login" => $request->get("login_auth", ""),
            "password" => $request->get("password_auth", ""),
        ];
        if (Auth::guard()->attempt($credentials, false)) {
            return redirect("cabinet/" . Auth::user()->id);
        } else {
            return redirect("/");
        }
    }

    protected function logoutForUser (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect("/");
    }

    public  function  getGroups(Request $request){
        $groups = Group::all();
        return response()->json($groups);
    }

    public function getUserInfo(Request $request){
        if(!Auth::check()) {
            return redirect("/");
        }
        $user = Auth::user();
        $user['group_name'] = Group::find($user->group_id);
        $user['birthday'] = date("d-m-Y", strtotime($user->birthday));
        return response()->json($user);
    }

    public function  changeUserInfo(Request $request){
        if(!Auth::check()) {
            return redirect("/");
        }
        $user = Auth::user();
        $user_cabinet = $request->all();
        $user_update = User::where('id_user', $user->id_user)->update(['login' => $user_cabinet["login"], 'email' => $user_cabinet["email"],
                    'password' => Hash::make($user_cabinet['password'])]);
        $user['group_name'] = Group::find($user->group_id);
        $user['birthday'] = date("d-m-Y", strtotime($user->birthday));
        return response()->json($user);
    }



}
