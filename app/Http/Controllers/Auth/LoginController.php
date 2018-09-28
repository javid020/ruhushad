<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Molla as MollaModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected function guard()
    {
        return Auth::guard('mollas');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }


    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function login(Request $request)
    {
        // Check validation
        $this->validate($request, [
            'phone' => 'required|min:6|regex:/[0-9+]{13}/',
            'password' => 'required|min:6'
        ]);

        $phone = $request->get('phone');
        $password = $request->get('password');

        // Get user record
        $user = MollaModel::where(['phone'=> $phone,'password'=> Hash::make($password)])->first();

        // Check Condition Mobile No. Found or Not

//        !auth()->attempt(['phone'=>$request->get('phone'),'password'=>$request->get('password')])
//        if(auth()->attempt(['phone'=> $phone,'password'=> $password])) {
        if($user) {

            // Redirect home page
            return redirect()->route('mainpage');

        } else {

//            die(bcrypt($password));
            return redirect()->back()->with('message', 'Bele dannilar yoxdu.');
        }

    }

//    protected function credentials(Request $request)
//    {
//        if(is_numeric($request->get('email'))){
//            return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
//        }
//        return $request->only($this->username(), 'password');
//    }
}
