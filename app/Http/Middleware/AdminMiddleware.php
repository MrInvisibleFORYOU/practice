<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminMiddleware
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



        if (Auth::user()->usertype == "admin") {
            return $next($request);
        } else {
            $user = Auth::user();
            if ($user) {
                if (Auth::user()->usertype != null) {
                    $routeName = $request->route()->getName();
                    if (isset($routeName)) {
                        $roleName = Auth::user()->usertype;
                        $role = Role::findByName($roleName);
                        if ($role->hasAnyPermission($routeName)) {
                            return $next($request);
                        } else {
                            return redirect('/notAuthorized');
                        }
                    } else {
                        return next($request);
                    }
                    
                }
            } else {
                return redirect('/notAuthorized');
            }

            // if (Auth::user()->usertype!=null) {
            //     $routeName = $request->route()->getName();
            //     $roleName = Auth::user()->usertype;
            //     $role = Role::findByName($roleName);

            //     if ($role->hasPermissionTo($routeName)) {
            //         return redirect()->route($routeName);
            //     } else {
            //             return redirect('/home');
            //     }

            // }
            return redirect('/home')->with("status", "you are not allowed in the admin dashboard");
        }
    }
}