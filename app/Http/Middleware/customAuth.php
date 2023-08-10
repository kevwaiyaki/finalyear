<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class customAuth
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
        $path = $request->path();
        if($path=="logins" && Session::get('user')){
        return redirect('/admins');
        }
        else if(($path!="logins" && !Session::get('user')) && ($path!="registration" && !Session::get('user'))){
        return redirect()->route('Report.create');
        }
        return $next($request);
    }

}
