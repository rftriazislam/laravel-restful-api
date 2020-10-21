<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\WebUser;

class FrontendController extends Controller
 {
    public function register( Request $request ) {
     $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:web_
            
            users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            ] );

        $user = New WebUser();
        $user->name = $request->input( 'name' );
        $user->email = $request->input( 'email' );
        $user->country_code = $request->input( '+880' );
        $user->password = Hash::make( $request->input( 'password' ) );
        $user->save();

        return back();
    }
    

}