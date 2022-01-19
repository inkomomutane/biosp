<?php

namespace Tests\Feature;

use App\Http\Traits\RemoveDuplicates;
use App\Models\Benificiary;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
    }
}
