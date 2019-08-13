<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2018/6/27
 * Time: 15:08
 */

namespace App\Models\Casts;

use X1024\Laravel\Utils\TypeHelper;

trait CastsPrice
{

    public function fromPrice($value)
    {
        return TypeHelper::fromPrice($value);
    }

    public function toPrice($value)
    {
        return TypeHelper::toPrice($value);
    }

}