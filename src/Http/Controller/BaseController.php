<?php

namespace X1024\Laravel\Http\Controller;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use X1024\Laravel\Utils\AuthTrait;

class BaseController extends Controller
{
    use DispatchesJobs, AuthTrait;

//    public function index()
//    {
//        return UserService::instance()->test();
//    }
//
//    public function upload($id, Request $request)
//    {
//
//
//
////        dd($id, $request->file(), $request->all('position_id', 'material_type'));
//        $files = collect($request->allFiles())->flatten();
//        $result = $files->map(function (File $file) {
//            info($file->getFilename());
//            $url = config('filesystems.disks.oss.domain') . Storage::put('uploads', $file);
//            return ['url' => $url];
//        });
//            dd($result);
//        return APIHelper::api($result);
////
////        try {
////
////        } catch (\Exception $e) {
////
////            dd($e);
////        }
//    }

}
