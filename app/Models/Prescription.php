<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = ['disease', 'allergy', 'prescription'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
