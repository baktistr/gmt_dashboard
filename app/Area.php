<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;

    /**
     * An asset belongs to province.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    /**
     * An asset belongs to regency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }

    /**
     * An asset belongs to district.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    /**
     * An asset belongs to regional.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regional(): BelongsTo
    {
        return $this->belongsTo(TelkomRegional::class, 'telkom_regional_id');
    }

    /**
     * An asset belongs to wilayah telekomunikasi.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function witel(): BelongsTo
    {
        return $this->belongsTo(WilayahTelekomunikasi::class, 'witel_id');
    }

    /**
     * A category can have many assets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assets(): HasMany
    {
        return $this->hasMany(Building::class, 'area_id');
    }
}
