<?php

namespace X1024\Laravel\Http\Controller;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use X1024\Laravel\Utils\AuthTrait;

class BaseController extends Controller
{
    use DispatchesJobs, AuthTrait;

}
