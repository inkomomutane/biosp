<?php

namespace App\GraphQL\Directives;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Nuwave\Lighthouse\Auth\AuthServiceProvider;
use Nuwave\Lighthouse\Exceptions\AuthorizationException;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;
use Nuwave\Lighthouse\Schema\Values\FieldValue;
use Nuwave\Lighthouse\Support\Contracts\FieldResolver;

final class AospDirective extends BaseDirective implements FieldResolver
{
    // TODO implement the directive https://lighthouse-php.com/master/custom-directives/getting-started.html

    /**
     * @var AuthFactory
     */
    protected AuthFactory $authFactory;

    public function __construct(AuthFactory $authFactory)
    {
        $this->authFactory = $authFactory;
    }

    public static function definition(): string
    {
        return
        /** @lang GraphQL */
        <<<'GRAPHQL'
         directive @aosp on FIELD_DEFINITION
         GRAPHQL;
    }

    /**
     * Set a field resolver on the FieldValue.
     *
     * This must call $fieldValue->setResolver() before returning
     * the FieldValue.
     *
     * @param  FieldValue  $fieldValue
     * @return FieldValue
     */
    public function resolveField(FieldValue $fieldValue): FieldValue
    {
        $fieldValue->setResolver(function (): ?Authenticatable {
            $guard = $this->directiveArgValue('guard', AuthServiceProvider::guard());
            assert(is_string($guard) || is_null($guard));

            $user = $this
                ->authFactory
                ->guard($guard)
                ->user();
            if (! $user->hasRole('aosp')) {
                return throw new AuthorizationException();
            }
            // @phpstan-ignore-next-line phpstan does not know about App\User, which implements Authenticatable
            return $user;
        });

        return $fieldValue; // TODO implement the field resolver
    }
}
