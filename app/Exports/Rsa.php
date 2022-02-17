<?php

namespace App\Exports;

use App\Models\ForwardedService;
use App\Models\Genre;
use App\Models\PurposeOfVisit;
use App\Models\ReasonOpeningCase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Sheet;
use \Maatwebsite\Excel\Writer;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\False_;

class Rsa implements FromCollection, ShouldAutoSize, WithStyles, WithColumnWidths, WithTitle
{
    private $collection;
    private $length;

    public function __construct($collection)
    {
        $this->collection = $collection;
        $this->length = collect($collection)->count();
    }
    public function title(): string
    {
        return "Relatório";
    }
    public function styles(Worksheet $sheet)
    {

        $sheet->mergeCells('a1:b6');
        $sheet->getStyle('a1:b1')->getAlignment()->applyFromArray(
            [
                'horizontal'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'     => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'textRotation' => 0,
                'wrapText'     => FALSE
            ]
        );
        $sheet->getStyle('a1:b1')->getFont()->applyFromArray(
            [
                'name'      =>  'Arial',
                'size'      =>  10,
                'bold'      =>  true
            ]
        );

        $sheet->getStyle('a1:b' . $this->length)->getBorders()->applyFromArray([
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => '000000'],
            ],
        ]);

        $i = 5;
        ++$i;
        $sheet->mergeCells("A{$i}:B$i");
        ++$i;
        foreach (Genre::all() as $value) {
            ++$i;
        }
        ++$i;
        $sheet->mergeCells("A{$i}:B$i");
        foreach (PurposeOfVisit::all() as  $value) {
            ++$i;

            foreach (Genre::all() as $genre) {
                ++$i;
            }
        }
        ++$i;
        $sheet->mergeCells("A{$i}:B$i");
        foreach (ReasonOpeningCase::all() as  $value) {
            ++$i;
        }
        ++$i;
        $sheet->mergeCells("A{$i}:B$i");
        foreach (ForwardedService::all() as  $value) {++$i;
            foreach (Genre::all() as $genre) {++$i;}
        }
        ++$i;
        $sheet->mergeCells("a{$i}:B$i");
        foreach (ForwardedService::all() as  $value) {
            ++$i;}
    }

    /**
     *
     *
     *
     * @return Builder
     * */

    public function collection()
    {
        return  $this->collection;
    }
    public function columnWidths(): array
    {
        return [
            'a' => 70
        ];
    }
}
