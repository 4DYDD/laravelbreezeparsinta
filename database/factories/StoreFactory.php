<?php

namespace Database\Factories;

use App\Enums\StoreStatus;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;


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
            'user_id' => rand(2, 10),
            'logo' => 'images/stores/store.png',
            'name' => $name,
            'slug' => str($name)->slug(),
            'description' => fake()->paragraphs(2, true),
            'status' => StoreStatus::ACTIVE,
        ];
    }
}
