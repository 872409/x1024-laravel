<?php


namespace X1024\Laravel\Utils;


use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request;

/**
 * Class ClientInfo
 * @property int $app_type;
 * @property string $app_version;
 * @property string $ip;
 * @property string $client_system;
 * @property string $client_model;
 * @property int $uid;
 * @property boolean $is_iPhone;
 * @property boolean $is_iOS;
 * @package X1024\Utils
 */
class ClientInfo
{
    private $infos;
    public $uid;

    static private function _is(array &$array, $key, $needle, $expend_key = null)
    {
        $array['is_' . ($expend_key ?? $needle)] = mb_strpos($array[$key] ?? '', $needle) !== false;
    }

    static function make(HttpRequest $request = null)
    {
        $request = $request ?? Request::instance();
        $xApp = $request->header('X-App', 'app_type=0&app_version=0&uid=0&client_system=0&client_model=0');
        $xApp = urldecode($xApp);
        $clientInfo = [];
        parse_str($xApp, $clientInfo);

        $clientInfo['ip'] = $request->ip();

        static::_is($clientInfo, 'client_model', 'iPhone');
        static::_is($clientInfo, 'client_system', 'iOS');


        return new static($clientInfo);
    }

    public function __construct(array $infos)
    {
        $this->infos = $infos;
    }


    public function __get($name)
    {
        return $this->_getKey($name, null);
    }

    private function _getKey($name, $default)
    {
        return $this->infos[$name] ?? $default;
    }


}
