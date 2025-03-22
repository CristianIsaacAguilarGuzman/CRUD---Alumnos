<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Alumno;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlumnoControllerTest extends TestCase
{
    use RefreshDatabase; // Limpia la base de datos después de cada prueba

    /** @test */
    public function se_puede_ver_la_lista_de_alumnos()
    {
        // Crear dos alumnos en la base de datos
        Alumno::factory()->count(2)->create();

        // Hacer una petición GET a la ruta de índice
        $response = $this->get(route('alumnos.index'));

        // Verificar que la vista contiene los alumnos
        $response->assertStatus(200);
        $response->assertViewHas('alumnos');
    }

    /** @test */
    public function se_puede_ver_el_formulario_de_creacion()
    {
        $response = $this->get(route('alumnos.create'));

        $response->assertStatus(200);
        $response->assertViewIs('alumnos.create');
    }

    /** @test */
    public function se_puede_crear_un_alumno()
    {
        $datos = [
            'nombre' => 'Juan Pérez',
            'correo' => 'juan@example.com',
            'fecha_nacimiento' => '2000-05-10',
            'ciudad' => 'Ciudad de México'
        ];

        $response = $this->post(route('alumnos.store'), $datos);

        // Verificar que el alumno fue creado
        $this->assertDatabaseHas('alumnos', ['correo' => 'juan@example.com']);
        $response->assertRedirect(route('alumnos.index'));
    }

    /** @test */
    public function se_puede_ver_el_formulario_de_edicion()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->get(route('alumnos.edit', $alumno));

        $response->assertStatus(200);
        $response->assertViewIs('alumnos.edit');
    }

    /** @test */
    public function se_puede_actualizar_un_alumno()
    {
        $alumno = Alumno::factory()->create();

        $nuevosDatos = [
            'nombre' => 'Carlos López',
            'correo' => 'carlos@example.com',
            'fecha_nacimiento' => '1998-08-20',
            'ciudad' => 'Monterrey'
        ];

        $response = $this->put(route('alumnos.update', $alumno), $nuevosDatos);

        $this->assertDatabaseHas('alumnos', ['correo' => 'carlos@example.com']);
        $response->assertRedirect(route('alumnos.index'));
    }

    /** @test */
    public function se_puede_eliminar_un_alumno()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->delete(route('alumnos.destroy', $alumno));

        $this->assertDatabaseMissing('alumnos', ['id' => $alumno->id]);
        $response->assertRedirect(route('alumnos.index'));
    }
}
