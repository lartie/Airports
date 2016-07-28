<?php

namespace LArtie\Airports\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * @package App
 * @property string $name_en
 * @property string $name_ru
 * @property string $iso_code
 */
class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_ru', 'iso_code',
    ];

    /**
     * Города в стране
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
