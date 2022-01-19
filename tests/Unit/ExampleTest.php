<?php

namespace Tests\Unit;

use App\Http\Traits\RemoveDuplicates;
use App\Models\Benificiary;
use App\Models\Genre;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RemoveDuplicates;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {

        $variables = $this->init(new Benificiary(),'uuid');
        	dd($variables);
        $this->assertTrue(true);
    }


}
