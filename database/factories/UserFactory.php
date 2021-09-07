<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = User::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition()
    {
        return [
            'name' =>"Administrator",
            'email' => "administrator@sumburero.org",
            'email_verified_at' => now(),
            'password' => bcrypt('#adminis@trator@2021#'),
            'remember_token' => Str::random(10),
            'neighborhood_uuid' => \App\Models\Neighborhood::all()->first(),
        ];
    }
}
