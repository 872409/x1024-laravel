<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2018/6/29
 * Time: 15:23
 */

namespace X1024\Laravel\Storage;


use Illuminate\Support\Str;

class StorageHelper
{
    public static function fileDecodeWrap($imagesUrls)
    {
        if (is_string($imagesUrls)) {
            $images = json_decode($imagesUrls, true);
            return static::filesWrap($images);
        }
        return $imagesUrls;
    }

    public static function filesWrap($images)
    {
        return array_map(function ($image) {
            return static::fileUrl($image);
        }, $images);
    }

    public static function fileUrl($url)
    {
        if (is_string($url)) {
            return self::fileWrap($url);
        }
        if (is_array($url)) {
            return self::filesWrap($url);
        }
        return $url;
    }

    public static function fileWrap($path)
    {
        if (empty($path)) {
            return '';
        }

        $path_flag = Str::startsWith($path, '/') ? '' : '/';

        return Str::startsWith($path, 'http') ? $path : config('filesystems.disks.cosv5.cdn') . $path_flag . $path;
//        return Str::startsWith($path, 'http') ? $path : config('filesystems.disks.aliyun_oss.domain') . '/' . $path;
//        return Str::startsWith($path, 'http') ? $path : Storage::disk(config('admin.upload.disk'))->url($path);
    }

}