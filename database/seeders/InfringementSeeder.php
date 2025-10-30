<?php

namespace Database\Seeders;

use App\Models\Infringement;
use Illuminate\Database\Seeder;

class InfringementSeeder extends Seeder
{
    public function run(): void
    {
            $infringement =[
                "A" => "sonstige Owi mit Tatzeit/Tatzeitraum und Tatort",
                "B" => "sonstige Owi mit Tatzeit/Tatzeitraum",
                "C" => "sonstige Owi mit Tatort",
                "D" => "sonstige Owi",
                "K" => "sonstige Owi mit Feststellungszeit/Zeitraum und Feststellungsort",
            ];

            foreach($infringement as $short => $name){
                Infringement::create([
                    "name" => $name,
                    "short" => $short
                ]);
            }
    }
}
