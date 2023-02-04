<?php

use App\Models\User;

beforeEach(function () {
    $this->bootRefreshesSchemaCache();
    rolesSeed();
});

it('should authenticate via graphql .', function () {
    $user = User::factory()->create();
    $response = $this->graphQL(query:
        'mutation auth {
          login(email: "'.$user->email.'", password: "password"){
            ulid,
            name,
            email,
            created_at,
            updated_at
          }
        }'
    )->assertJson([
        'data' => [
            'login' => [
                'ulid' => $user->ulid,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ],
        ],
    ]);
});
