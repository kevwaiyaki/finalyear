<?php

namespace App\Http\Controllers;

use App\Auth;
use Illuminate\Http\Request;
use App\deanu;
use App\user;
use App\Student;
use Crypt;
use File;
use Response;
use DB;
use Illuminate\Support\Facades\Hash;

class RestoController extends Controller
{
    function registerUser(Request $req){
        $validateData = $req->validate([
        'school' => 'required',
        'name' => 'required|regex:/^[a-z A-Z]+$/u',
        'email' => 'required|email',
        'password' => 'required|min:6|max:12',
        'confirm_password' => 'required|same:password'
        ]);
        $result = \DB::table('deanu')
            ->where('email',$req->input('email'))
            ->get();
        $res = json_decode($result,true);
        print_r($res);
        if(sizeof($res)==0){
            $data = $req->input();
            $user = new deanu;
            $user->school = $data['school'];
            $user->name = $data['name'];
            $user->email = $data['email'];
            $encrypted_password = crypt::encrypt($data['password']);
            $user->password = $encrypted_password;
            $user->save();
            $req->session()->flash('register_status','User has been registered successfully');
            return redirect()->route('Sysadmin.index');
        }
        else{
            $req->session()->flash('register_status','This Email already exists.');
            return redirect()->route('Sysadmin.index');
        }
        }
    function loginUser(Request $req){
        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $_SESSION["email"]=$req->input('email');
        $result = \DB::table('deanu')
            ->where('email',$req->input('email'))
            ->get();
        $res = json_decode($result,true);
        print_r($res);
        if(sizeof($res)==0){
            $req->session()->flash('error','Email Id does not exist. Please register yourself first');
            echo "Email Id Does not Exist.";
            return redirect('Dean/login');
        }
        else{
            echo "Hello";
            $encrypted_password = $result[0]->password;
            $decrypted_password = crypt::decrypt($encrypted_password);
        if($decrypted_password==$req->input('password')){
            echo "You are logged in Successfully";
            $req->session()->put('deanu',$req->input('email'));
            return redirect()->route('Reply.create');
        }
        else{
            $req->session()->flash('error','Password Incorrect!!!');
            echo "Email Id Does not Exist.";
            return redirect('Dean.login');
        }
        }
    }
    function sys(Request $req){
        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($req->input('email')=="admin@gmail.com" && $req->input('password')=="admin"){
            return redirect()->route('Sysadmin.index');
        }

    }
    function sysUser(Request $req){
        $validateData = $req->validate([
        'school' => 'required',
        'name' => 'required|regex:/^[a-z A-Z]+$/u',
        'email' => 'required|email',
        'password' => 'required|min:6|max:12',
        ]);
        $result = \DB::table('users')
            ->where('email',$req->input('email'))
            ->get();
        $res = json_decode($result,true);
        print_r($res);
        if(sizeof($res)==0){
            $data = $req->input();
            $user = new user;
            $user->school = $data['school'];
            $user->name = $data['name'];
            $user->email = $data['email'];
            $encrypted_password = Hash::make($data['password']);
            $user->password = $encrypted_password;
            $user->save();
            $req->session()->flash('register_status','COD has been registered successfully');
            return redirect()->route('Sysadmin.index');
        }
        else{
            $req->session()->flash('register_status','This Email already exists.');
            return redirect()->route('Sysadmin.index');
        }
        }
    public function downloadfile(Request $req){
        $validatedData = $req->validate([
            'file' => 'required'
        ]);

        $file=public_path('picture_images/'.$req->input('file'));
        return response::download($file);

    }

}
