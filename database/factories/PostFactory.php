<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    // FACTORY SIRVE PARA HACER PRUEBAS A LA BASE DE DATOS

    /* CORREMOS LA PRUEBA FACTORY CON 
        - sail artisan tinker 
        - App\Models\Post::factory(); 
        - Post::factory()->times(200)->create();   con times(200) indicamos las veces que debe llenar el formulario y con create crea todos esos post
        */
    // DESPUES DE CORRER LA PRUEBA, AGREGARA 200 REGISTROS EN LA TABLA POSTS y SI HAY ERRORES LO DIRA

    // PARA REVERTIR UNA MIGRACION COMO ESTA USAMOS sail artisan migrate:rollback --step=1 PERO ESTO REVERTISA TAMBIEN LA CREACION DE LA TABLA
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = '2ae215b1-1f97-4675-b369-79e970ba7e8e.png';
        return [
            //
            'titulo' => $this->faker->sentence(5),
            'descripcion' => $this->faker->sentence(20),
            'imagen' => $this->faker->uuid() . '.jpg',            
            'user_id' => $this->faker->randomElement([1, 2, 4]), 
        ];
    }
}
