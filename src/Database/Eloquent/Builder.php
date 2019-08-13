<?php


namespace X1024\Laravel\Database\Eloquent;


use Closure;

/**
 * Class Builder
 * @method  Builder apiWith(array $values)
 * @method  Builder apiSelect($selectExt = [])
 * @method  Builder selectNames(array|string ...$names)
 * @package X1024\Database\Eloquent
 */
class Builder extends \Illuminate\Database\Eloquent\Builder
{
    /**
     * Add a basic where clause to the query.
     *
     * @param bool|\Closure $when
     * @param string|array|\Closure $column
     * @param mixed $operator
     * @param mixed $value
     * @param string $boolean
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function whenWhere($when, $column, $operator = null, $value = null, $boolean = 'and')
    {
        $_when = $when;
        if ($when instanceof Closure) {
            $_when = $column();
        }

        if ($_when) {
            return $this->where($column, $operator, $value, $boolean);
        }

        return $this;
    }


    public function whenSelect($when, $column)
    {
        $_when = $when;
        if ($when instanceof Closure) {
            $_when = $column();
        }

        if ($_when) {
            return $this->addSelect($column);
        }

        return $this;
    }

}
