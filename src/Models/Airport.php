<?php

namespace LArtie\Airports\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Airport
 * @package App
 * @property string $iata_code
 * @property string $icao_code
 * @property integer $gmt_offset
 */
class Airport extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iata_code', 'icao_code', 'gmt_offset'
    ];

    /**
     * Город аэропорта
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
