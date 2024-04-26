<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prescription;

class Patient extends Model
{
    use HasFactory;

    // Spécifiez le nom de la table si nécessaire
    // protected $table = 'patients';

    protected $fillable = [
        'lastname',
        'firstname',
        'age',
        'birthday',
        'occupation',
        'temperature',
        'weight',
        'sexe',
        'telephone',
        'taille',
        'tension',
        'observation',
        'doctor_id',
        'consultation_code',
    ];


public function doctor()
{
    return $this->belongsTo(User::class, 'doctor_id');
}

public function prescriptions()
{
    return $this->hasMany(Prescription::class);
}



    // Définissez les relations, les accesseurs et les mutateurs si nécessaire
}
