<?php

namespace LArtie\Airports\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package App
 *
 * @property string $name_en
 * @property string $name_ru
 */
class City extends Model
{
    /**
     * @var string
     */
    protected $connection = 'flyinghigh';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_ru',
    ];

    /**
     * Аэропорты относящиеся к городу
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function airports()
    {
        return $this->hasMany(Airport::class);
    }

    /**
     * Страна города
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
