<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Socialite;
use Closure;

class RefreshProfile
{
    /**
     * Check if user's access token and profile meta data expired
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $checkRoute = [
            !$request->is('login'),   // must be !FALSE => TRUE
            !$request->is('login/*'), // must be !FALSE => TRUE
            !$request->is('logout'),  // must be !FALSE => TRUE
            Auth::check()                       // must be TRUE   => FALSE
        ];

        /*
         * Pass this middleware if you are doing something around login
         * If all the conditions are true, go ahead
         */
        if (!in_array(false, $checkRoute))
        {
            $user = Auth::user();

            if(steem_expired($user))
            {
                /** @var \SocialiteProviders\Steem\Provider $steem */
                $steem = Socialite::driver('steem');
                $em    = app('em');
                /*
                 * Try to reach api/me endpoint to control if the access token still valid
                 */
                try {
                    $response = $steem->userFromToken($user->getAccessToken());
                    steem_update($user, $response, $em);

                } catch (\GuzzleHttp\Exception\ClientException $e) {
                    /*
                     * If it's already expired, get a fresh one with refresh token
                     */
                    if($e->getCode() === 401)
                    {
                        $token = refresh_token($user);

                        if($token !== false)
                        {
                            $user->setAccessToken($token);
                            $em->flush();

                            /*
                             * Update my profile with new access token
                             */
                            $response = $steem->userFromToken($user->getAccessToken());
                            steem_update($user, $response, $em);

                            return $next($request);
                        }
                    }
                    return redirect('logout');
                }
            }
        }

        return $next($request);
    }
}
