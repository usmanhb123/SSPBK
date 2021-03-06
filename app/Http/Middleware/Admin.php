<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class Admin

{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    if(AUTH::User() != null){
            if(AUTH::User()->user_role_id == 6){
            $request->session()->flash('warna', 'danger');
            $request->session()->flash('status', 'Anda tidak memiliki akses untuk membuka halaman tersebut!');
            return redirect()->back();
            }elseif(AUTH::User()->user_role_id == 7){
                $request->session()->flash('warna', 'danger');
                $request->session()->flash('status', 'Anda tidak memiliki akses untuk membuka halaman tersebut!');
                return redirect()->back();
                }elseif(AUTH::User()->user_role_id == 8){
                    $request->session()->flash('warna', 'danger');
                    $request->session()->flash('status', 'Anda tidak memiliki akses untuk membuka halaman tersebut!');
                    return redirect()->back();
                    }
    }else{
        $request->session()->flash('warna', 'danger');
        $request->session()->flash('status', 'Anda harus login dulu!');
            return redirect('/login');
    }
        return $next($request);
    }
}
