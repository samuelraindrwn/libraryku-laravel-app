<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    function index (){
        return view('index');
    }
    
    function signup (){
        if (session()->has('user')){
            return redirect('home');
        }
        $title = 'Sign Up';
        return view('auth.signup',compact('title'));
    }

    function register (Request $request){
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users',
            'dob' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
            'confpassword' => 'required',
            'role' => 'required'
        ]);
        if($request->confpassword != $request->password){
            return redirect()->back()->with('error', 'Password and Confirm password are not the same.');
        }
        $user_id = str::uuid()->toString();
        $data =[
            'user_id' => $user_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'dob' => $request->dob,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $request->role
        ];
            User::create($data);
            return redirect('/login')->with('success','Registration successful.');
    }
    
    function signin (Request $request){
        if (session()->has('user')){
            return redirect('home');
        }
        $title = 'Login';
        return view('auth.login',compact('title'));
    }
    
    function login (Request $request){  
        $credentials = $request->only('username', 'password');
        $user = User::where('username', $credentials['username'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return redirect()->back()->with('error','Username or password is incorrect.')->withInput();
        }
        $rememberMe = $request->has('remember');

        if ($rememberMe) {
            $rememberToken = Str::random(60);

            $user->update(['remember_token' => $rememberToken]);

            $request->session()->put('user', $user);
            
            $request->cookie('remember_token', $rememberToken, 86400 * 30);
        } else {
            $user->update(['remember_token' => null]);
            $request->session()->put('user', $user);
        }
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard')->with('success', 'Successfully Login.');
        } else {
            return redirect('/home')->with('success', 'Successfully Login.');
        } 
    }

    public function updateProfile (Request $request){
    $user = $request->session()->get('user');
    $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'username' => 'required|unique:users,username,'.$user->user_id.',user_id',
        'dob' => 'required',
        'email' => 'required|email|unique:users,email,'.$user->user_id.',user_id',
    ]);

    $user = User::updateOrCreate(
    ['user_id' => $user->user_id],
    [
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'username' => $request->input('username'),
        'dob' => $request->input('dob'),
        'email' => $request->input('email'),
    ]);
    
    $request->session()->put('user', $user);
    return redirect()->back()->with('success', 'Profile successfully updated.');
    }
    
    public function changePassword(Request $request)
    {
    $user = $request->session()->get('user');

    if (!Hash::check($request->password, $user->password)) {
        return redirect()->back()->with('error','The current password is incorrect.');
    }
    if($request->new_password != $request->conf_password){
        return redirect()->back()->with('error','The New password is not same.');
    }
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with('success', 'Password successfully changed.');
    }
    
    public function logout(Request $request){    
        $request->session()->forget('user');
        $request->session()->flush();
        $cookie = Cookie::forget('remember_token');

        return redirect('/login')->withCookie($cookie);
    }
        
    function showForgotPasswordForm(){
        $title = 'Forgot Password';
        return view('auth.forgot-password', compact('title'));
    }

    public function sendResetLink(Request $request)
    {
        $title = 'Reset Password';
        $request->validate([
        'email' => 'required|email',
        ]);

        $email = $request->email;
        $email1 = User::where('email', '=', $request->email)->first();
        if(!$email1){
            return redirect('/login')->with('error','Email is incorrect.');
        }
        
        return view('auth.reset-password',compact('title','email'));
    }
    
    public function reset(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if($request->new_password !== $request->conf_password){
            return redirect('/forgot-password')->with('error', 'The New password is not same.');
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        
        return redirect('/login')->with('success','Password successfully changed.');
    }
}