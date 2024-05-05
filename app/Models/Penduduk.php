<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin IdeHelperPenduduk
 */
class Penduduk extends Model
{
    /**
     * The attribute that became primary key
     */
    protected $primaryKey = 'penduduk_id';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'penduduk_id'
    ];

    /**
     * Eloquent Model Relationships
     */
    public function kader(): HasOne
    {
        return $this->hasOne(Kader::class, 'penduduk_id', 'penduduk_id');
    }
    public function pemeriksaans(): HasMany
    {
        return $this->hasMany(Pemeriksaan::class, 'penduduk_id', 'penduduk_id');
    }
    public function bantuanPangans(): HasMany
    {
        return $this->hasMany(BantuanPangan::class, 'penduduk_id', 'penduduk_id');
    }
}
