<?php

beforeEach(function () {
    $this->bootRefreshesSchemaCache();
    rolesSeed();
});
it('it should delete beneficiary from graphql', function () {
    $beneficiary = \App\Models\Beneficiary::factory()->create();
    $user = login(roles: 'aosp');
    $token = $user->createToken('token')->plainTextToken;
    $this->graphQL(query:
        'mutation deleteBeneficiary{
            deleteBeneficiary(
            ulid: "'.$beneficiary->ulid.'"
            ){
                ulid
            }
        }'
    )->assertJsonStructure([
        'data' => [
            'deleteBeneficiary' => [
                'ulid'
            ],
        ],
    ])->withHeaders([
        'Authorization' => 'Bearer '.$token,
    ]);
    $this->assertDatabaseCount('beneficiaries',0);
});
