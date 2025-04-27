<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

        public function secciones()
        {
            return $this->belongsToMany(Seccion::class);
        }

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'correo', 'fecha_nacimiento', 'ciudad'];
}
