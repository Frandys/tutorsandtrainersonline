<?php

namespace App\Http\Middleware;

use App\Model\Plan;
use App\Model\Subscription;
use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class EmployerMiddleware
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
        $user = \Sentinel::check();
        if (!empty($user) && $user != '') {
            if (\Sentinel::getUser()->roles()->first()->slug == 'employer') {

            $subs =  json_decode(json_encode(Subscription::whereUserId($user->id)->first()));

                if($subs->trans_id == ''){
                    Session::flash('error','You have to subscribe us to use feature');
                    return Redirect::to('subscription/'.encrypt($user->id));
                }
             $plan =  json_decode(json_encode(Plan::find($subs->plan_id)));
             $planDate = strtotime('+'.$plan->duration,$subs->created);
             if(time() > $planDate){
                 Session::flash('error','Your subscription has been expired');
                 return Redirect::to('subscription/'.encrypt($user->id));
             }

           //    print_r($plan->duration);

                $response = $next($request);
                return $response->header('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate')
                    ->header('Pragma', 'no-cache')
                    ->header('Expires', 'Sun, 02 Jan 1990 00:00:00 GMT');
            } else {
                return \Redirect::to('/');
            }
        } else {
            return \Redirect::to('/login');
        }
    }
}
