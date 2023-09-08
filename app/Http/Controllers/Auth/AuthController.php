<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }
    public function postRegistration(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users' ,
            'phone' => 'required|min:10' ,
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        $createUser = $this->create($data); // for validations 
        return redirect('login')->withSuccess('You have registered successfully');
    }
    public function create(array $data) // public function with an array 
    {
         return User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'phone'=> $data['phone'],
            'password'=> $data['password'],
         ]);
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            
            'email' => 'required|email' ,
            'phone' => 'required|min:10' ,
            'password' => 'required',
        ]);
        $checklogincredentials = $request->only('email','password');
        if(Auth::attempt($checklogincredentials))
        {
            return redirect('dashboard')->withSuccess('You have successfully loggedin.'); 
        }
            return redirect('login')->withSuccess('Your login credentials are incorrect.');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        
        return redirect('login'); // this will redirect to the login page clear session and redirects to the login page
    }
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect('login')->withSuccess('please login to access the dashboard page.');
       

    }
}
