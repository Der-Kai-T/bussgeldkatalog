<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    public function run(): void
    {
        $cnfs = [
            "globalPrefix" => "B"
        ];

        foreach ($cnfs as $key => $value) {
            Configuration::create([
                'key' => $key,
                'value' => $value,
            ]);
        }
    }
}
