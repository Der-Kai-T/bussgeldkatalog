<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Law;

class ExportController extends Controller
{
    public function exportCSV()
    {
        $fileName = 'tb_katalog_stand_' . now()->format('Y_m_d_His') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ];



        $callback = function () {
            $handle = fopen('php://output', 'w');

            $gmk = Configuration::where("key", "gmk")->first()->value;
            $prefix = Configuration::where("key", "globalPrefix")->first()->value;
            $columnDef = [
                "GMK",
                "TBNR",
                "Superdeskriptor",
                "TBText",
                "Zitat",
                "FAP",
                "Regelbetrag",
                "Gueltig-bis",
                "Gueltig-von",
                "VerjaehrungVorsatz",
                "VerjaehrungFahrl",
                "Verstoß",
                "Eingabeflag"
            ];

            fputcsv($handle, $columnDef, ";");

            $laws = Law::with("allegations")->get();

            foreach ($laws as $law) {
                foreach ($law->allegations as $allegation) {
                    $tbnr = $prefix . $law->prefix . $allegation->number;
                    $line = [
                        $gmk,
                        $tbnr,
                        $law->name,
                        $allegation->text,
                        $allegation->quote,
                        "",
                        $allegation->fine_regular,
                        $allegation->valid_until?->format('Y-m-d'),
                        $allegation->valid_from?->format('Y-m-d'),
                        $allegation->legal_maximum_intention,
                        $allegation->legal_maximum_careless,
                        $allegation->infringement?->short,
                        "1"
                    ];
                   fputcsv($handle, $line, ";");
                }
            }

            fclose($handle);
        };
       return response()->stream($callback, 200, $headers);

    }
}
