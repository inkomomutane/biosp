<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;

class Biosp implements WithMultipleSheets,WithProperties
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
            new Sa($this->collection[0]),
            new Rsa($this->collection[1])
        ];
    }

    public function properties(): array
    {
        return [
            'creator'        => 'Nelson Alexandre Mutane',
            'lastModifiedBy' => 'Nelson Alexandre Mutane',
            'title'          => 'Biosp Database',
            'description'    => 'Relatório de atendimentos dos benificiarios nos BIOSPs',
            'subject'        => 'Relatórios',
            'keywords'       => 'Relatórios,Biosp,excel',
            'category'       => 'Relatórios',
            'manager'        => 'Nelson Alexandre Mutane',
            'company'        => 'Sumburero',
        ];
    }

}

