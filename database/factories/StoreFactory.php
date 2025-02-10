<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->name();
        $id_user = ['2', '3'];

        return [
            'user_id' => fake()->randomElement($id_user),
            'logo' => 'images/stores/store.png',
            'name' => $name,
            'slug' => str($name)->slug(),
            'description' => fake()->text(200),
            'status' => 'pending',
        ];
    }
}
