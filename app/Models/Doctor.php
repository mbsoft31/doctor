<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    use HasFactory;

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
        "user_id",
        "speciality_id"
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
}
