<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Sheet;
use \Maatwebsite\Excel\Writer;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;

class Biosp implements WithMultipleSheets, WithEvents
{
    use Exportable;
    protected $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            new SA($this->collection)
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function (BeforeExport $event) {
                $event->writer->getProperties()->setCreator('Nelson Alexandre Mutane')->setLastModifiedBy("Nelson Alexandre Mutane")->setSubject("Biosp database")->setKeywords("BIOSP")->setCategory("Non Prof Application");
                $event->writer->getProperties()->setTitle("Biosp Database")->setDescription("Bese de dados de registo de actividades nos biop's.");
                $event->writer->getProperties()->setCompany("Sumburero")->setManager("Nelson Alexandre Mutane");
            },
            BeforeWriting::class => function (BeforeWriting $event) {
            },
            AfterSheet::class => function (AfterSheet $event) {
            },
        ];
    }
}

class SA implements FromCollection, ShouldAutoSize, WithStyles, WithColumnWidths, WithTitle
{
    private $collection;
    private $length;

    public function __construct($collection)
    {
        $this->collection = $collection;
        $this->length = collect($collection[0])->count();
    }
    public function title(): string
    {
        return "SA";
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('a1:x'.$this->length)->getBorders()->applyFromArray([
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => '000000'],
            ],
        ]);



        $sheet->mergeCells("a1:x2");
        $sheet->getStyle('A1:x2')->getFill()->applyFromArray(
            [
                'fillType' => Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 0,
                'startColor' => [
                    'rgb' => 'aed199'
                ],
                'endColor' => [
                    'argb' => 'aed199'
                ]
        ]);
        $sheet->getStyle('A3:x3')->getFill()->applyFromArray(
            [
                'fillType' => Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 0,
                'startColor' => [
                    'rgb' => 'a5abac'
                ],
                'endColor' => [
                    'argb' => 'a5abac'
                ]
        ]);
        //

            $sheet->getStyle('a1:x'.$this->length)->getAlignment()->applyFromArray(
                [
                    'horizontal'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    'vertical'     => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'textRotation' => 0,
                    'wrapText'     => TRUE
                ]
        );
    }
    /**
     * @return Builder
     */
    public function collection()
    {
        return  $this->collection;
    }
    public function columnWidths(): array
    {
        return [];
    }
}

    /*
    class RSA implements FromCollection, ShouldAutoSize, WithStyles, WithColumnWidths, WithTitle
    {
        private $collection;

        public function __construct($collection)
        {
            $this->collection = $collection[1];
        }
        public function title(): string
        {
            return "Relatório";
        }
        public function styles(Worksheet $sheet)
        {
        }
        /**
         * @return Builder

        public function collection()
        {
            return  $this->collection;
        }
        public function columnWidths(): array
        {
            return [];
        }
    }
    */
