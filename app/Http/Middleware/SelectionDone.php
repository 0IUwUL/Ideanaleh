<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\UserPreferenceController;

class SelectionDone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = Auth::id();
        $following = (new UserPreferenceController)->_getUserPreferences($userId);
        // dd($following[0]['followed']);
        if (Auth::check()) {
           if ($following[0]['followed'])
                return $next($request);
            return redirect('/');
        }
        return redirect('/');
    }
}
