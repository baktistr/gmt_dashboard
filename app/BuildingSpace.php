<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// use Spatie\Image\Manipulations;

class BuildingSpace extends Model
{

    protected $table = "building_spaces";
    /**
     * A building space belongs to building
     *
     * @return BelongsTo
     */
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    /**
     * A building space can have many
     *
     * @return HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(BuildingSpacePrice::class, 'building_space_id');
    }

    /**
     * Scope Query
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true)->get();
    }

    // /**
    //  * Register the media collections
    //  */
    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('image')
    //         ->onlyKeepLatest(10)
    //         ->registerMediaConversions(function () {
    //             $this->addMediaConversion('thumbnail')
    //                 ->fit(Manipulations::FIT_CROP, 160, 105)
    //                 ->performOnCollections('image')
    //                 ->nonQueued();
    //         });
    // }
}
