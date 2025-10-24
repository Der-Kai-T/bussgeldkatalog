<?php

namespace Database\Seeders;

use App\Models\Allegation;
use App\Models\Law;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AllegationSeeder extends Seeder
{
    public function run(): void
    {
        //TB-Nr. Vorschlag,Benötigt überprüfung,Superdeskriptor,TBText,Zitat,Regelbetrag
        Schema::disableForeignKeyConstraints();
        Allegation::truncate();
        Schema::enableForeignKeyConstraints();
        $valid_from = Carbon::createFromFormat('Y-m-d', '2025-01-01');
        $filename = "database/seeders/data/allegations.csv";
        //find file
        if(is_file($filename)) {
            $data = file_get_contents($filename);
            $lines = explode("\n", $data);
            foreach ($lines as $line) {
                if (str_starts_with($line, "TB-Nr")) {
                    echo " skipping line \n";
                    continue; //skip first line with headlines
                }
                $line = explode(";", $line);
                if (count($line) < 6) {
                    continue; //skip empty lines
                }
                $number = $line[0];
                $note = $line[1];
                $law = $line[2];
                $text = $line[3];
                $quote = $line[4];
                $regular = $line[5];
                $lawObject = $this->findLaw($number);


                if (!is_null($lawObject)) {
                    Allegation::create([
                        "text" => $text,
                        "quote" => $quote,
                        "law_id" => $lawObject->id,
                        "number" => substr($number, -2),
                        "fine_regular" => strlen($regular) > 1 ? $regular : null,
                        "valid_from" => $valid_from,
                    ]);
                }else{
                    dump($line);
                }
            }
        }

    }

    public function findLaw(string $number)
    {
        //check if first digit is a letter
        $first = substr($number, 0, 1);
        if(!is_numeric($first)) {
            $number = substr($number, 1); // remove letter
        }
        $lawNumber = substr($number, 0, 3);
        return Law::where('prefix', $lawNumber)->first();
    }
}
