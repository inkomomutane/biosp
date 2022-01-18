<?php

namespace Tests\Unit;

use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {

        $date  = now();
        //echo $date->month(0)->monthName;
        echo $date->month(12);
        dd(( $date->month(5)->month > 3  ? $date->month - 3 : 1 ));
        $this->assertTrue(true);
    }
}
