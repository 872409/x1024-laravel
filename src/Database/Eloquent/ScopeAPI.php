<?php


namespace X1024\Laravel\Database\Eloquent;


use Illuminate\Database\Eloquent\Builder;

trait ScopeAPI
{

    protected $apiSelect = [];

    public function scopeAPIWith(Builder $query, array $withs)
    {
        $withsFunctions = [];
        collect($withs)->map(function ($item, $key) use (&$withsFunctions) {
            if (is_string($item)) {
                $withsFunctions[$item] = function ($query) {
                    return $query->apiSelect();
                };
            } else if (is_callable($item)) {
                $withsFunctions[$key] = $item;
            }
        });
        return $query->with($withsFunctions);
    }


    public function scopeAPISelect(Builder $query, $selectExt = [])
    {
        $_selects = [];

        if (isset($this->apiSelect)) {
            $_selects = $this->apiSelect;
        }

//        if ($auth && isset($this->apiAuthSelect)) {
//            $_selects = array_merge($_selects, $this->apiAuthSelect);
//        }

        $selects = is_array($selectExt) ? array_merge($_selects, $selectExt) : $_selects;

        if (!empty($selects)) {
            return $query->addSelect($selects);
        }
    }


    public function scopeSelectNames(Builder $query, $names)
    {
        $args = func_get_args();
        $_names = is_array($names) ? $names : array_splice($args, 1);

        foreach ($_names as $name) {
            $_name = $name . 'Select';
            $_select = $this->{$_name} ?? false;
            if (is_array($_select)) {
                $query->addSelect($_select);
            }
        }
    }
}
