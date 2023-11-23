<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Genrialtrait as AppGenrialtrait;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class chekloginadmin
{
    use AppGenrialtrait ;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try

        {

            $user = JWTAuth::parseToken() -> authenticate() ;

        }

        catch(\Exception $error)

        {

            if($error instanceof TokenExpiredException)

            {

                return $this -> returnerror('401' , 'The token has been expired !') ;

            }

            elseif ($error instanceof TokenInvalidException)

            {

                return $this -> returnerror('498' , 'The token is invalide !') ;

            }

            else

            {

                return $this -> returnerror('404' , 'The token does not exists') ;

            }

        }
        return $next($request);
    }
}
