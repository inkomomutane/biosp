<?php

namespace Tests\Feature;

use App\Models\Benificiary;
use App\Models\Country;
use Tests\TestCase;

class DeletionRowsTablesCascadeTest extends TestCase
{


    public function test_is_forced_delete_country_remove_all_subchildrens_entries()
    {
        Benificiary::factory()->create();
        $country = Country::first();
        $this->assertDatabaseCount('countries', 1);
        $country->forceDelete();
        $this->assertDatabaseEmpty('provinces');
        $this->assertDatabaseEmpty('neighborhoods');
        $this->assertDatabaseEmpty('biosps');
        $this->assertDatabaseEmpty('benificiaries');
    }

    public function test_is_not_forced_delete_country_not_remove_all_subchildrens_entries()
    {
        Benificiary::factory()->create();
        $country = Country::first();
        $country->delete();
        $this->assertDatabaseCount('countries', 1);
        $this->assertDatabaseCount('provinces', 1);
        $this->assertDatabaseCount('neighborhoods', 1);
        $this->assertDatabaseCount('biosps', 1);
        $this->assertDatabaseCount('benificiaries', 1);
    }

    public function test_is_delete_benificiary_not_afect_any_other_models_with_relation_to_him()
    {
        $benificiary = Benificiary::factory()->create();
        $db_benificiary = Benificiary::latest()->first();
        $this->assertEquals($benificiary->toArray(), $db_benificiary->toArray());
        $db_benificiary->delete();
        $this->assertDatabaseCount('countries', 1);
        $this->assertDatabaseCount('provinces', 1);
        $this->assertDatabaseCount('neighborhoods', 1);
        $this->assertDatabaseCount('biosps', 1);
        $this->assertDatabaseEmpty('benificiaries');
    }
}
