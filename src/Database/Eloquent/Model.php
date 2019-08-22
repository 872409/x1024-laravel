<?php


namespace X1024\Laravel\Database\Eloquent;

use \Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Model
 * @package X1024\Database\Eloquent
 */
class Model extends Eloquent
{
    use ScopeAPI,
        CustomCast,
        CastsStorage;

    /**
     * @return Builder
     */
    public static function query()
    {
        return (new static)->newQuery();
    }

    
    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @return Eloquent|Builder
     */
    public function newEloquentBuilder($query)
    {
        return new Builder($query);
    }


}
