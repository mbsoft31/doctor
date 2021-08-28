<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @method static where(string $string, mixed $id)
 */
class Appointment extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasMetas;

    protected $casts = [
        "metas" => "array",
    ];

    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attachments');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function appointment_at(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->morphTo("appointment_at");
    }

    public function isAppointmentAt($model)
    {
        return (
            (
                $model->user->hasRole("doctor") &&
                $this->appointment_at_id == $model->id &&
                $this->appointment_at_type == "App\Models\Doctor"
            ) ||
            (
                $model->user->hasRole("laboratory") &&
                $this->appointment_at_id == $model->id &&
                $this->appointment_at_type == "App\Models\Laboratory"
            ));
    }

    public function isConsulted()
    {
        return $this->state == "consulted";
    }

    public function isAccepted()
    {
        return $this->state == "accepted";
    }

    public function getDateFormatedAttribute()
    {
        $date = Carbon::createFromFormat("Y-m-d H:i", $this->date . ' ' . $this->time);
        return $date->format('l') . ", " . $date->format("Y-m-d, H:i");
    }

    public function shortRelativeDiffForHumans()
    {
        return Carbon::now()->shortRelativeDiffForHumans(Carbon::make(Carbon::createFromFormat("Y-m-d H:i", $this->date . ' ' . $this->time)));
    }

    public function getIsPastAttribute()
    {
        return Carbon::createFromFormat("Y-m-d H:i", $this->date . ' ' . $this->time)->isPast();
    }

}
