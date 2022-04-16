<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = ['all_pay_to_doctor'];

    public function setHolidaysAttribute($value)
    {
        $this->attributes['holidays'] = json_encode($value);
    }

    public function getHolidaysAttribute($value)
    {
        return $this->attributes['holidays'] = json_decode($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient_appointments(){
        return $this->belongsToMany(
            Appointment::class,
            'appointments',
            'patient_id',
            'doctor',
            'id',
            'id'
        );
    }

    public function major(){
        return $this->belongsTo(Major::class);
    }

    public function governorate(){
        return $this->belongsTo(Governorates::class);
    }

    public function city(){
        return $this->belongsTo(Cities::class);
    }
}
