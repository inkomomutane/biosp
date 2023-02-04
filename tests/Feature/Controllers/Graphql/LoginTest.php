<?php

beforeEach(function (){
    $this->bootRefreshesSchemaCache();
    rolesSeed();
});

it('should login and return token with user attributes data',function (){
    $user = \App\Models\User::factory()->create();
  $response =   $this->graphQL('
    mutation auth{
          login(email: "'. $user->email. '", password: "password"'.'){
            ulid,name,email
          }
        }
    ');
    $response->assertJson([
  "data" => [
        "login" => [
            "ulid" => $user->ulid,
            "name" => $user->name,
            "email" => $user->email
    ]]])->assertJsonStructure(
        [
            'data' => [
                'login' =>[
                    'ulid','name','email'
                ]
            ]
        ]
    );
});
