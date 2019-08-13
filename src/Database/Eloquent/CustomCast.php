<?php


namespace X1024\Laravel\Database\Eloquent;


trait CustomCast
{
    protected $ignore_custom_casts = ['json', 'array'];

    /**
     * {@inheritdoc}
     */
    protected function castAttribute($key, $value)
    {
        if ($this->hasCustomGetCaster($key)) {
            return $this->{$this->getCustomGetCaster($key)}($value);
        }

        return parent::castAttribute($key, $value);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    protected function hasCustomGetCaster($key)
    {
        return $this->hasCast($key) && method_exists($this, $this->getCustomGetCaster($key));
    }

    /**
     * @param string $key
     *
     * @return string
     */
    protected function getCustomGetCaster($key)
    {
        $castType = $this->getCastType($key);
        if (in_array($castType, $this->ignore_custom_casts)) {
            return null;
        }

        return 'from' . ucfirst($castType);
    }

    /**
     * {@inheritdoc}
     */
    public function setAttribute($key, $value)
    {

        if ($this->hasCustomSetCaster($key)) {
            $value = $this->{$this->getCustomSetCaster($key)}($value);
        }

        return parent::setAttribute($key, $value);
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    private function hasCustomSetCaster($key)
    {
        return $this->hasCast($key) && method_exists($this, $this->getCustomSetCaster($key));
    }

    /**
     * @param string $key
     *
     * @return string
     */
    private function getCustomSetCaster($key)
    {
        $castType = $this->getCastType($key);
        if (in_array($castType, $this->ignore_custom_casts)) {
            return null;
        }

        return 'to' . ucfirst($castType);
    }
}