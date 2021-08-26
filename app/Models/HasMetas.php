<?php

declare(strict_types=1);


namespace App\Models;


trait HasMetas
{

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function addMeta($key, $value): static
    {
        $options = $this->metas;

        $options[$key] = $value;
        $this->metas = $options;
        $this->save();

        return $this;
    }

    public function removeMeta($key)
    {
        $options = $this->metas;
        if ( isset($options[$key]) )
        {
            unset($options[$key]);
            $this->metas = $options;
            $this->save();
        }

        return $this;
    }

    public function getMeta($key, $default = null)
    {
        $options = $this->metas;
        if ( isset($options[$key]) )
        {
            return $options[$key];
        }
        return $default;
    }

}
