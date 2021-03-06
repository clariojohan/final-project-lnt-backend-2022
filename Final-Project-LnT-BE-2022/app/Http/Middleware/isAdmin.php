<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        // dd(auth()->user()->admin_id); -> dd is a function that will dump and die -> buat ngedebug
        
        if (auth()->user()->admin_id != null){
            return $next($request);
        }
        else {
            $message = "Only Admin can access this page";
            // echo "<script type='text/javascript'>alert('$message');</script>";
            // return redirect('/view');
            echo "<script>
            alert('$message');
            window.location.href='/view';
            </script>";
        }
    }
}
