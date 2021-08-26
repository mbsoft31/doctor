<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
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
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }
}
