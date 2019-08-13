<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2018/6/27
 * Time: 15:08
 */

namespace X1024\Laravel\Database\Eloquent;


use X1024\Storage\StorageHelper;

trait CastsStorage
{

    public function fromCloudFile($value)
    {
        return StorageHelper::fileUrl($value);
    }

    public function fromCloudFiles($value)
    {
        return StorageHelper::fileDecodeWrap($value);
    }

    public function toCloudFiles($value)
    {
        return json_encode($value);
    }


}