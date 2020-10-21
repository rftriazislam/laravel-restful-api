<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index(){
       return view('admin.pages.home');
   }
//----------------------------------------------------------------------------BD
public function BDUser(){
    return view('admin.All_User.BDUser');
}
public function BDTraveller(){
    return view('admin.All_Traveller.BD_Traveller');
}
public function BDAgent(){
    return view('admin.All_Agent.BD_Agent');
}

//------------------------------------------------------------------------------IND
public function INDUser(){
    return view('admin.All_User.INDUser');
}
public function INDTraveller(){
    return view('admin.All_Traveller.IND_Traveller');
}
public function INDAgent(){
    return view('admin.All_Agent.IND_Agent');
}

//---------------------------------------------------------------------------------PAK
public function PAKUser(){
    return view('admin.All_User.PAKUser');
}
public function PAKTraveller(){
    return view('admin.All_Traveller.PAK_Traveller');
}
public function PAKAgent(){
    return view('admin.All_Agent.PAK_Agent');
}
//---------------------------------------------

public function userinfo(){
    return view('admin.pages.userinfo');
}

}
