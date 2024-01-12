<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Validator;


class userController extends Controller
{
    protected $redirectTo=RouteServiceProvider::HOME;
    public function __construct(){
        $this->middleware('guest')->except([
            'logout','innerPage','dashboard'
        ]);
    }
    public function register(){
        return view('register');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:250',
            'email'=>'required|email|max:250|unique:users',
            'password'=>'required|min:8'
        ],[
            'name.required' => 'The Field  is required',
            'email.required'    => 'email is empty or enter unique email',
            'password.required' => 'The Field  is required atleaset 8 charcater or digit password'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data = $request->input();
            try {
                $crud = new User;
                $crud->name = $data['name'];
                $crud->email = $data['email'];
                $crud->password = Hash::make($data['password']);

                $crud->save();
                $credentials =$request->only('email','password');
                Auth::attempt($credentials);
                $request->session()->regenerate();
                return redirect('innerPage')
                ->withSuccess('you have successfully registered and Login !');
            } catch (Exception $e) {
                return redirect()->back()->with('failed', "operation failed");
            }
        }
    }
    public function login()
    {
        return view('login');
    }
    public function innerPage()
    {
        if(Auth::check())
        {
            return view('innerPage');
        }
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('innerPage')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
            'password' => 'enter valid password .',
        ])->onlyInput('email');

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess('you have succesfully Logout');

    }
}
