<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class UserProfile extends Controller
{
    //

    public function show(){
        $user=Auth::user();
        $ip=request()->ip();
        $position=Location::get($ip);
        $country=$position ? $position->countryName : "Unkwown";
        return view('profilePage', compact('user', 'country'));
    }

    
}
