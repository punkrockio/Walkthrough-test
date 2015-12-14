<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Post;

class AuthourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // if (isset($_COOKIE["loggedIn"])) {
        //     return "Cookie is set!";
        // }
        // return "Cookie is not set :(";
        return view('Authour/index')->withUsers(User::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Authour/create');
    }


    public function getLogin()
    {
        return view('Authour/login');
    }

    // Post login 1

    // public function postLogin(Request $request)
    // {
    //     $authour = User::where('email', $request->email)->first();
    //     // if (Hash::check($request->password, $authour->password)) {
    //     //     Auth::login($authour);
    //     //     return 'Your email is: ' . Auth::user()->email;
    //     // }

    //     return "failed";
    // }


    // Post login 2

    public function postLogin(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            setcookie("email", $request->email, time() + (86400 * 60), "/");
            return redirect()->intended('/');
        }

        return "failed";
    }

    public function logout()
    {
        Auth::logout();

        if (isset($_SERVER['HTTP_COOKIE'])) {
             $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {

                $mainCookies = explode('=', $cookie);
                $name = trim($mainCookies[0]);
                setcookie($name, '', time() - 1000);
                setcookie($name, '', time() - 1000, '/');
            }
            
        }
        return redirect()->intended('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $authour = new User;
        $authour->name = $request->name;
        $authour->email = $request->email;
        $authour->password = Hash::make($request->password);
        $authour->save();
        return redirect()->intended('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $authour = User::findOrFail($id);

        return view('Authour/show')->withAuthour($authour);
    }

    public function showPosts($id)
    {
        $authour = User::find($id);

        return $authour->posts;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
