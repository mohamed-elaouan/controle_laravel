<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SignController extends Controller
{
    public function SignIn()
    {
        return view("Pages.Anth.SignIn");
    }
    public function SignUp()
    {
        return view("Pages.Anth.SignUp");
    }
    public function Add_User(UserRequest $req)
    {
        $req->validated();
        $formf = $req->validated();
        //methode 1 :
        //utilisateur::create($req->post());
        //methode 2 :
        //dd($req);Hash::make(),
        $formf['role'] = "manager";
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            "password" => $req->password,
            'role' => $formf['role'],
        ]);
        return redirect()->route("SignIn"); //->with('Success', "Bienvenue M.{$req->name}");
    }
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required |email',
            'password' => 'required',
        ]);
        $value = ["email" => $request->email, "password" => $request->password];
        if (Auth::attempt($value)) {
            $request->session()->regenerate();
            return redirect()->route("home")->with('Success', "Welcome");
        } else {
            return back()->withErrors(["email" => "email/Password incorrect"])->onlyInput('email');
        }
    }
    public function LogOut()
    {
        Session::flush();
        Auth::logout();
        return to_route('SignIn');
    }
}
