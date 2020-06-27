<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Order;
use App\Notifications\UserEmailNotification;

class AuthController extends Controller
{

    public function register ()
    {
        return view('frontend.auth.register');
    }
    public function registerprocess (Request $request)
    {
       $this->validate($request, [
         'name' => 'required',
         'email' => 'required',
         'password' => 'required',
       ]);

       try {

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'email_verification_token' => time().$request->input('email').random_int(2, 10),
           ]);

           $user->notify(new UserEmailNotification($user));

           $this->setSuccess('You registered, Please verify your account');

           return redirect()->route('login');

       } catch (\Exception $e) {

           $this->setError($e->getMessage());
           return redirect()->back();
       }



    }

    public function registeractivate ($token = null)
    {
        if ($token === null) {
         return redirect()->route('page.index');
        }

        $user = User::where('email_verification_token', $token)->firstOrFail();

        if($user) {

         $user->update([
             'email_verified_at' => now(),
             'email_verification_token' => 0,
         ]);

         $this->setSuccess('Account activated successfully');
         return redirect()->route('login');

        }

        $this->setError('Invalid token');
        return redirect()->route('register');
    }




    public function login ()
    {
        return view('frontend.auth.login');
    }
    public function loginprocess (Request $request)
    {


          $credentials = $request->only('email', 'password');


        if(Auth::attempt($credentials)){

            if( Auth::user()->email_verified_at === null ){

                $this->setError('Your account is not activated!!!!');
                return redirect()->route('login');
            }

            $this->setSuccess('You are logged In.');
            return redirect()->route('page.index');
        }

        $this->setError('Invalid credentials!!!!');
        return redirect()->route('login');
    }

    public function logout ()
    {
        Auth::logout();
        $this->setSuccess('You are logged Out.');
        return redirect('/');
    }

    public function dashboard ()
    {
        $user = auth()->user()->id;
        $data = [];
        $data['order'] = Order::where('user_id', $user)->get();

        return view('frontend.auth.dasboard', $data);

    }
}
