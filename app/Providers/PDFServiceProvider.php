<?php

namespace App\Providers;


use App\Models\Configuration;

class PDFServiceProvider extends \TCPDF
{

    public $HeaderImageHeight = 15;

    public $HeaderImageWidth;
    public $HeaderImageFileHeight = 491;
    public $HeaderImageFileWidth = 1306;

    public $PageWidth = 210;
    public $PageHeight = 297;
    public float $mm_per_pt = 0.352778;
    public float $pt_per_mm = 2.83465;

    public $marginLeft = 15;
    public $marginRight = 15;
    public $marginTop = 25;
    public $marginBottom = 15;

    public $col1 = 25;
    public $col2 = 145;

    public function calcImageWidth()
    {
        $this->HeaderImageWidth = ($this->HeaderImageHeight / $this->HeaderImageFileHeight) * $this->HeaderImageFileWidth;
    }

    public function Header()
    {
        $height = 20;
        $this->SetLeftMargin($this->marginLeft);
        $this->SetTopMargin($this->marginTop);
        $this->SetRightMargin($this->marginRight);

        if (is_null($this->HeaderImageWidth)) {
            $this->calcImageWidth();
        }

        if ($this->PageNo() > 1) {
            $this->SetDrawColor(0, 0, 0);
            //$this->Line($this->marginLeft , $height, $this->PageWidth - $this->marginRight , $height);
            $this->Image(getcwd() . "/storage/img/title_logo.png",
                $this->PageWidth - $this->HeaderImageWidth - $this->marginRight, 5, $this->HeaderImageWidth, $this->HeaderImageHeight,
            );
            $this->setFontSize(8);
            $this->writeHTMLCell($this->getPageWidth() - $this->HeaderImageWidth - $this->marginRight - $this->marginLeft,
            10, $this->marginLeft, $height-5, $this->getConfiguration("pdf.header"));
        } else {

        }

    }

    public function Footer(): void
    {
        if ($this->PageNo() > 1) {
            $this->SetY(-15);

            $pageText = $this->getAliasNumPage();
            $this->Cell(0, 10, $pageText, 0, 0, 'C');
        }
    }

    public function getConfiguration(string $key)
    {
        $c = Configuration::where('key', $key)->first();
        if(is_null($c)) {
            return "";
        }else
        {
            return $c->value;
        }
    }

    public function tableHeadline($y)
    {
        $this->SetFillColor(200, 200, 200);
        $this->Rect($this->marginLeft, $y , $this->PageWidth - $this->marginRight - $this->marginLeft, 14 * $this->mm_per_pt, "F");

        $this->SetFont('Helvetica', 'B', 11);
        $this->SetXY($this->marginLeft, $y);
        $this->Write(14 * $this->mm_per_pt, "TB-Nummer");

        $this->SetXY($this->marginLeft + $this->col1, $y);
        $this->Write(14 * $this->mm_per_pt, "Tatbestand");

        $this->SetXY($this->marginLeft + $this->col2, $y);
        $this->Cell(35, 14 * $this->mm_per_pt, "Regelsatz", 0, 0, 'R');
        $this->SetY($this->GetY() + 14 * $this->mm_per_pt);
        $this->SetFont('Helvetica', ' ', 10);
    }
}
