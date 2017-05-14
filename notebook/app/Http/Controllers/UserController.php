<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
    	$this->validate($request,
    		['email' =>'email|required|unique:users',
    		'password' =>'required|min:6']);

    	$user = new User([
    		'email' => $request->input('email'),
    		'password' => bcrypt($request->input('password'))
    	 ]);
    	$user->save();
    	Auth::login($user);

    	return redirect()->route('user.welcome');
    }
    public function getSignIn()
    {
    	return view('diary.signin');
    }

    public function postSignIn(Request $request)
    {
    	$this->validate($request,
    		['email' =>'email|required',
    		'password' =>'required|min:6']);

    	if(Auth::attempt(['email' => $request->input('email'),
                         'password' => $request->input('password')]))
        {

        return redirect()->route('user.welcome');
        }

        else
            return redirect()->back();
    }
     public function getProfile()
    {
    	$user = Auth::user();
    	if(!($user->content == NULL))
    	{
    	return view('diary.welcome',['contents' => $user->content]);
        }
        else
        	return view('diary.welcome',['contents' => null]);
    }

    public function postUpdate(Request $request)
    {
    	$user = Auth::user();
    	DB::table('users')
            ->where('id', $user->id)
            ->update(['content' => $request->input('content')]);

       return response()->json(['success' => true]);
    }

    public function getLogout()

    {
    	Auth::logout();
    	return redirect()->route('diary.index');
    }
}
