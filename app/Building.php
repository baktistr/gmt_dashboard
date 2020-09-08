<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use SoftDeletes;

    protected $table = "buildings";

    /**
     * {@inheritDoc}
     */
    protected $casts = [
        'is_available' => 'boolean',
    ];

    /**
     * {@inheritDoc}
     */
    public static $types = [
        'rent' => 'Sewa',
        'sale' => 'Jual',
    ];

    /**
     * Get formatted price on rupiah.
     *
     * @return string
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp.' . number_format($this->price);
    }

    /**
     * get formatted building code.
     *
     * @return string
     */
    public function getFormattedBuildingCodeAttribute()
    {
        return "{$this->area->code}-{$this->building_code}";
    }

    /**
     * Scope a query to only include available assets.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    /**
     * An asset belongs to pic user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pic(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pic_id');
    }

    /**
     * An asset belongs to location code.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    /**
     * An asset can have many prices.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(AssetPrice::class, 'asset_id');
    }

    /**
     * A building can have many spaces.
     *
     * @return HasMany
     */
    public function spaces(): HasMany
    {
        return $this->hasMany(BuildingSpace::class, 'building_id');
    }

    /**
     * A building can have many certificates.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificates(): HasMany
    {
        return $this->hasMany(AssetCertificate::class, 'building_id');
    }

    /**
     * Asset Has Many Asset Pbb.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assetPbbs(): HasMany
    {
        return $this->hasMany(AssetPbb::class, 'building_id');
    }

    /**
     * A building can have many Asset disputes Histories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disputeHistories(): HasMany
    {
        return $this->hasMany(AssetDisputeHistory::class, 'building_id');
    }

    /**
     * Asset can have many other documents.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function otherDocuments(): HasMany
    {
        return $this->hasMany(AssetOtherDocument::class, 'building_id');
    }

    /**
     * Asset can have many floors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function floors(): HasMany
    {
        return $this->hasMany(AssetFloor::class, 'building_id');
    }

    /**
     * Asset can have many PLN ID.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plns(): HasMany
    {
        return $this->hasMany(AssetPln::class, 'building_id');
    }
    /**
     * Asset can have many Assurance.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function insurances(): HasMany
    {
        return $this->hasMany(Insurance::class, 'building_id');
    }

    /**
     * A building can assign many help-desks.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function helpDesks(): HasMany
    {
        return $this->hasMany(User::class, 'building_id')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'Help Desk');
            });
    }

    /**
     * A building can have many complaints.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function complaints(): HasMany
    {
        return $this->hasMany(BuildingHelpDesk::class, 'building_id');
    }

    /**
     * A Building can Have Many electricity consumptions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function electricityConsumptions(): HasMany
    {
        return $this->hasMany(BuildingElectricityConsumption::class, 'building_id');
    }
}
