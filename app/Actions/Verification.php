<?php

namespace App\Actions;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class Verification {
    
    public function handle(Request $request): bool
    {
        $user =  User::findOrFail(Auth::id()) ?? User::firstWhere('email', $request->email);
        
        if($request->code == $user->code) return true;
        
        return false;
    }

}