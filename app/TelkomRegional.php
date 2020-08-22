<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class TelkomRegional extends Model
{
    /**
     * Get formatted name.
     *
     * @return mixed|string|string[]
     */
    public function getFormattedNameAttribute()
    {
        return str_replace('TREG', 'Regional', $this->name);
    }

    /**
     * A regional can have many areas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function areas(): HasMany
    {
        return $this->hasMany(Area::class, 'witel_id');
    }

    /**
     * A regional can have many assets.
     *
     */
    public function assets(): HasManyThrough
    {
        return $this->hasManyThrough(Asset::class, Area::class, 'telkom_regional_id');
    }
}
