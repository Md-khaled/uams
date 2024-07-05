<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Availability;
use App\Models\Service;
use App\Models\User;
use App\Models\UserService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory()->count(10)->create();

        $services = Service::factory()->count(10)->create();

        $users->each(function ($user) use ($services) {
            $user->services()->attach(
                $services->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        Availability::factory()->count(50)->create();
    }
}
