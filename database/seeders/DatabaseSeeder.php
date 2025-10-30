<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if(config('app.env') === 'local') {
            $password = "password";
        }else{
            $password = Str::password();
        }



        User::create([
            'name' => 'Admin',
            'email' => 'admin@example',
            'password' => Hash::make($password),
        ]);

        echo "Password: $password\n";
        $this->call([
            ConfigurationSeeder::class,
            InfringementSeeder::class,
            LawSeeder::class,
            AllegationSeeder::class,
        ]);
    }
}
