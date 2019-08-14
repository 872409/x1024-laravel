<?php


namespace X1024\Laravel\Utils;


//use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait AuthTrait
{
    public function authUserID($guard = 'api')
    {
        return Auth::guard($guard)->id();
    }

    /**
     * @param string $guard
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function authUser($guard = 'api')
    {
        return Auth::guard($guard)->user();
    }
}