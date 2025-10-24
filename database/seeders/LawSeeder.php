<?php

namespace Database\Seeders;

use App\Models\Allegation;
use App\Models\Law;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class LawSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Law::truncate();
        Allegation::truncate();
        Schema::enableForeignKeyConstraints();
        $valid_from = Carbon::createFromFormat('Y-m-d', '2025-01-01');
        $filename = "database/seeders/data/laws.csv";
        //find file
        if(is_file($filename)){
            $data = file_get_contents( $filename );
            $lines = explode("\n",$data);
            foreach($lines as $line){
                if(str_starts_with($line,"Verordnung")){
                    echo" skipping line \n";
                    continue; //skip first line with headlines
                }
                $line = explode(";",$line);
                if(count($line) < 3)
                {
                    continue; //skip empty lines
                }
                $law = $line[0];
                $department = $line[1];
                $prefix = $line[2];


                $law = explode(" - ", $law);
                Law::create([
                    "name" => $law[1] ?? $law[0],
                    "short" => $law[0],
                    "department" => $department,
                    "prefix" => $prefix,
                    "valid_from" => $valid_from,
                ]);
            }
        }
    }
}
