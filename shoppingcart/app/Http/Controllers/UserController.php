<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Order;
use Auth;
use Session;
use Validator;
class UserController extends Controller
{
    public function getSignup()
    {
    	return view('user.signup');
    }
    public function postSignup(Request $request)
    {
    $this->validate($request,[
            'email' => 'required|email|unique:users',
            'password' =>'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z]).+$/'//atleast 1 UC
            ]);

            $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();
        Auth::login($user);
        
        return redirect()->route('product.index');
    }

    public function getSignin()
    {
        return view('user.signin');
    }
    public function postSignin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' =>'required|min:4'
            ]);

        if(Auth::attempt(['email' => $request['email'] ,
                         'password' => $request['password']]))
        {

        return redirect()->route('product.index');
        }

        else
            return redirect()->back() ->withInput()
                                     ->withErrors([
                                    'password' => 'Incorrect username/password!'
            ]);
    }
    public function getPassword()
    {
        return view('user.forgotpass');
    }
    public function getProfile()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.profile',['orders'=> $orders]);
    }
    public function getLogout()
    {
        Session::flush();
       Auth::logout();

       return redirect() ->route('user.signin');
    }
}
