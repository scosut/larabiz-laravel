<?php

namespace App\Http\Middleware;

use Closure;
use App\Listing;

class UserSecurity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $listingId = $request->listing;
      $listingUserId = Listing::find($listingId)->user_id;
      $loggedInUserId = auth()->user()->id;
      
      if ($listingUserId == $loggedInUserId) { 
        return $next($request); 
      }
      
      return redirect()->to('/');
    }
}
