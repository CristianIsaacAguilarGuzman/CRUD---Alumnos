<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class);
    }
}
