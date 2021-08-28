<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    use HasFactory;
    use HasMetas;

    protected $casts = [
        "metas" => "array",
    ];

    protected $fillable = [
        "first_name",
        "last_name",
        "gender",
        "birthdate",
        "birth_place",
        "address",
        "city",
        "zip",
        "country",
        "state",
        "metas",
        "user_id",
        "speciality_id",
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function appointments(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Appointment::class, "appointment_at");
    }

    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function scopeCity(Builder $query, $city = null)
    {
        if ( ! is_null($city) && $city != '') {
            $query->where("city", "=", $city);
        }
        return $query;
    }

    public function scopeSearch(Builder $query, $search = null)
    {
        if ( ! is_null($search) && $search != '') {
            $query->where("first_name", 'like', "%$$search%")
                ->orWhere("last_name", 'like', "%$search%")
                ->orWhere("address", 'like', "%$search%");
        }
        return $query;
    }
}
