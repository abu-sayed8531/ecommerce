<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerProfile;
use App\Models\User;

class CustomerProfileSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        foreach ($users as $user) {
            CustomerProfile::factory()->create(['user_id' => $user->id]);
        }
    }
}
