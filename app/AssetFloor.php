<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetFloor extends Model
{
    use SoftDeletes;

    /**
     * Get formatted building floor.
     *
     * @return string
     */
    public function getFormattedFloorAttribute()
    {
        return "Lantai {$this->floor}";
    }

    /**
     * Asset Dispute History BelongsTo Asset
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asset(): BelongsTo
    {
        return $this->belongsTo(Building::class , 'asset_id');
    }
}
