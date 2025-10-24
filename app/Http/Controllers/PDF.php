<?php

namespace App\Http\Controllers;

use App\Models\Law;
use App\Providers\PDFServiceProvider;

class PDF extends Controller
{
    public function generate()
    {
        $debugBorder = 0;
        $pdf = new PDFServiceProvider();
        $pdf->AddPage();
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetFillColor(255, 255, 255);

        $pdf->Image(getcwd() . "/storage/img/title_logo.png",
            $pdf->PageWidth /2 - $pdf->HeaderImageWidth , $pdf->PageHeight/3 - $pdf->HeaderImageHeight, $pdf->HeaderImageWidth*2, $pdf->HeaderImageHeight*2,
        );
        $pdf->SetFont("Helvetica", "B", 16);
        $pdf->SetY($pdf->PageHeight/3 + $pdf->HeaderImageHeight +10);
        $pdf->MultiCell($pdf->PageWidth - $pdf->marginRight - $pdf->marginLeft, 16 * $pdf->mm_per_pt, $pdf->getConfiguration("pdf.title"), $debugBorder, "C");
        $pdf->SetFont("Helvetica", " ", 10);
        $pdf->MultiCell($pdf->PageWidth - $pdf->marginRight - $pdf->marginLeft, 16 * $pdf->mm_per_pt, $pdf->getConfiguration("pdf.date"), $debugBorder, "C");
        $pdf->AddPage();
        $pdf->SetFontSize(11);
        $pdf->writeHTMLCell($pdf->PageWidth - $pdf->marginLeft - $pdf->marginRight, 11 * $pdf->mm_per_pt, $pdf->marginLeft,'', $pdf->getConfiguration("pdf.foreword"));
        $prefix = $pdf->getConfiguration("globalPrefix");




        foreach (Law::all()->sortBy("prefix") as $law) {
            if($law->allegations->where("print", true)->count() == 0)
            {
                continue;
            }

            $pdf->AddPage();
            $pdf->SetXY($pdf->marginLeft, $pdf->marginTop + 5);
            $pdf->SetFont('Helvetica', 'B', 16);
            $pdf->MultiCell($pdf->PageWidth - $pdf->marginLeft -  $pdf->marginRight, 10, $law->prefix . " - " . $law->name . " (" . $law->short . ")", $debugBorder, "L");

            $y = $pdf->GetY();
            $pdf->tableHeadline($y);

            foreach($law->allegations as $allegation) {

                if(empty($allegation->fine_min) && empty($allegation->fine_max)) {
                    $fine = number_format($allegation->fine_regular, 2, ",",".");
                }else {
                    $fine = number_format($allegation->fine_min, 2, ",", ".")
                        . " bis "
                        . number_format($allegation->fine_max, 2, ",", ".");
                }



                $y = $pdf->GetY();
                $maxY = $pdf->GetY();


                $pdf->SetY($y);
                $pdf->SetX($pdf->marginLeft);
                $pdf->MultiCell($pdf->col1, 10 * $pdf->mm_per_pt, $prefix.$law->prefix.$allegation->number, $debugBorder);


                $pdf->SetY($y);
                $pdf->SetX($pdf->marginLeft + $pdf->col1);
                $pdf->MultiCell($pdf->col2-$pdf->col1, 10 * $pdf->mm_per_pt, $allegation->text, $debugBorder, "L");

                $pdf->SetX($pdf->marginLeft + $pdf->col1);
                $pdf->SetFont('Helvetica', ' ', 8);
                $pdf->MultiCell($pdf->col2-$pdf->col1, 10 * $pdf->mm_per_pt, $allegation->quote, $debugBorder, "L");
                $pdf->SetFont('Helvetica', ' ', 10);
                $maxY = $pdf->GetY();


                $pdf->SetY($y);
                $pdf->SetX($pdf->marginLeft + $pdf->col2);
                $pdf->MultiCell(35, 10 * $pdf->mm_per_pt,
                    $fine,
                    $debugBorder, "R");


                $pdf->SetY($maxY + 14 * $pdf->mm_per_pt);
                if($pdf->GetY() > $pdf->PageHeight *0.9) {
                    $pdf->AddPage();
                    $pdf->tableHeadline($pdf->GetY());
                }
            }

        }

        $pdf->Output("test.pdf", "I");
    }
}
