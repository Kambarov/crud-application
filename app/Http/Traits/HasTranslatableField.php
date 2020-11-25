<?php

namespace App\Http\Traits;

trait HasTranslatableField
{
    function getTranslation($column, $locale)
    {
        return json_decode($this->attributes[$column], true)[$locale];
    }
}
