<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\MessageBag;
class MultiController extends Controller
{
  

    protected function attemptLogin(Request $request)
    {
        $customerAttempt = Auth::guard('india')->attempt(
            $this->credentials($request), $request->has('remember')
        );
        if(!$customerAttempt){
            return Auth::guard('bang')->attempt(
                $this->credentials($request), $request->has('remember')
            );
        }
        return $customerAttempt;
    }
    public function login(Request $request)
    {


 
        $validator = $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|string'
      ]);
    
        
        if (Auth::guard('india')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            $user = Auth::guard('india')->user();


            $success['token'] =  $user->createToken('india')->accessToken;
            return response()->json(['user'=>$user,'success' => $success]);



        } 
        else if (Auth::guard('bangladesh')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

               
           


            $user = Auth::guard('bangladesh')->user();


            $success['token'] =  $user->createToken('bangladesh')->accessToken;
            return response()->json(['user'=>$user,'success' => $success]);
   
        }
    
        // if Auth::attempt fails (wrong credentials) create a new message bag instance.
        $errors = new MessageBag(['password' => ['Adresse email et/ou mot de passe incorrect.']]);
        // redirect back to the login page, using ->withErrors($errors) you send the error created above
        return redirect()->back()->withErrors($errors)->withInput($request->only('email', 'password'));
    }
   



}
