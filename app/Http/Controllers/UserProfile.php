<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function update(Request $request){
        $user=Auth::user();
       $validated= $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'gender'  => 'nullable|in:female,male,other,prefer_not',
            'address' => 'nullable|string|max:255'
        ]);

        
        $user->fill($validated);
        $user->save();

        return redirect()->back()->with('success_profile', 'Profile updated.')
        ->with('active_tab', 'edit');
    }

    public function updatePassword(Request $request){
        $user=Auth::user();
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|min:8|max:20|confirmed'
        ]);

        if(!Hash::check($request->current_password, $user->password)){
            return redirect()->back()->withErrors(['current_password' => 'Your current password is incorrect'], 'password')
            ->with('active_tab', 'security');
        }

        $user->update([
            'password'=>Hash::make($request->password)
        ]);

        return redirect()->back()->with('success_password', 'Password updated successfully.')
        ->with('active_tab', 'security');

    }

    public function deleteAccount(Request $request){
        $user=Auth::user();

        Auth::logout($user);

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}
