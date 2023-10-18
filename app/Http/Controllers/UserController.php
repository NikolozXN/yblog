<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{

    //show registration form to user
    public function registerView()
    {
        return view('users.register');
    }

    //store and login new user
    public function store(StoreUserRequest $request)
    {


        //validate incoming request
        $validated = $request->validated();
        if (Gate::allows('admin')) {
            return redirect('/admin')->with('message', 'Registered as admin');
        }
        //check if request has file, in this case store image in public directory, avatars folder
        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        //hash password
        $validated['password'] = Hash::make($validated['password']);

        //create/insert and then login user to his/her account
        $user = User::create($validated);
        Auth::login($user);

        return redirect('/')->with('message', 'You Are Registered And Logged In');
    }

    //show login form to user
    public function loginView()
    {
        return view('users.login');
    }

    //login returned user
    public function login(LoginUserRequest $request, User $user)
    {
        //validate incoming request
        $validated = $request->validated();

        //check if user entered correct info of his/her account. 
        if (Auth::attempt($validated)) {
            if (Gate::allows('admin')) {
                return redirect('/admin')->with('message', 'Logged in as an Admin');
            };

            if (auth()->user()->deleted_at) {
                auth()->logout();
                return back()->with('message', 'you are blocked');
            }
            // if it's true redirect with success message
            session()->regenerateToken();
            return redirect('/')->with('message', 'You Are Logged In');
        }
        //if user is not in db show error only at email field
        return back()->withErrors(['email' => 'Your Credentials Are Wrong'])->onlyInput();
    }

    //logout user
    public function logout(Request $request)
    {
        //logout user
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You Are Logged  out');
    }
}
