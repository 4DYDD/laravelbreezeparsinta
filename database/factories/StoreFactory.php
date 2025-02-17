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
    private static bool $hasGeneratedTwo = false; // Status awal: belum pernah menghasilkan 2

    public function definition(): array
    {
        $name = str(fake()->word())->title();
        $userId = self::$hasGeneratedTwo ? rand(2, 10) : 2; // Jika sudah pernah 2, random antara 2-10, jika belum, paksa 2

        if ($userId === 2) {
            self::$hasGeneratedTwo = true; // Tandai bahwa angka 2 sudah pernah dihasilkan
        }

        return [
            'user_id' => $userId,
            'logo' => 'images/stores/store.png',
            'name' => $name,
            'slug' => str($name)->slug(),
            'description' => fake()->paragraphs(2, true),
            'status' => StoreStatus::ACTIVE,
        ];
    }
}
