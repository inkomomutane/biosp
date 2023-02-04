<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL\Error\Error;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class Login
{
    /**
     * @param null $_
     * @param array<string, mixed> $args
     * @throws Error
     */
    public function __invoke($_, array $args): User
    {
        // Plain Laravel: Auth::guard()
        // Laravel Sanctum: Auth::guard(Arr::first(config('sanctum.guard')))
        $guard = Auth::guard(Arr::first(config('sanctum.guard')));
        $user = User::whereEmail($args['email'])->first();

        if(!$user || !Hash::check($args['password'],$user->password) ){
            throw new Error(
                message:   __('auth.failed')
            );
        }
      return $user;
    }
}
