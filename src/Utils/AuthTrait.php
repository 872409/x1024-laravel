<?php


namespace X1024\Laravel\Utils;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait AuthTrait
{
    public function authUserID()
    {
        return Auth::guard('api')->id();
    }

    public function authUser(): ?User
    {
        return Auth::guard('api')->user();
    }
}