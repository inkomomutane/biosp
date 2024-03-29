<?php

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;
use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;
use Nuwave\Lighthouse\Testing\RefreshesSchemaCache;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\artisan;
use function Pest\Laravel\seed;
use Spatie\Permission\PermissionRegistrar;
use Tests\CreatesApplication;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(TestCase::class,
    CreatesApplication::class,
    RefreshDatabase::class,
    RefreshesSchemaCache::class,
    MakesGraphQLRequests::class
)->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function login(User $user = null, $roles = 'super-admin')
{
    $user ??= (User::factory()->create())
        ->syncRoles($roles);
    actingAs($user);

    return $user;
}

/**
 * @throws BindingResolutionException
 */
function rolesSeed(): void
{
    artisan('config:clear');
    seed(RolesAndPermissionsSeeder::class);
    app()->make(PermissionRegistrar::class)->registerPermissions();
}
