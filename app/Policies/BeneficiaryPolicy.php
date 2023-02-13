<?php

namespace App\Policies;

use App\Models\Beneficiary;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BeneficiaryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return Response|bool
     */
    public function viewAny(User $user): Response|bool
    {
        return $user->hasAnyRole(['aosp', 'super-admin']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Beneficiary  $beneficiary
     * @return Response|bool
     */
    public function view(User $user, Beneficiary $beneficiary): Response|bool
    {
        return $user->hasAnyRole(['aosp', 'super-admin']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        return $user->hasAnyRole(['aosp', 'super-admin']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Beneficiary  $beneficiary
     * @return Response|bool
     */
    public function update(User $user, Beneficiary $beneficiary): Response|bool
    {
        return $user->hasAnyRole(['aosp', 'super-admin']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Beneficiary  $beneficiary
     * @return Response|bool
     */
    public function delete(User $user, Beneficiary $beneficiary): Response|bool
    {
        return $user->hasAnyRole(['aosp', 'super-admin']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Beneficiary  $beneficiary
     * @return Response|bool
     */
    public function restore(User $user, Beneficiary $beneficiary): Response|bool
    {
        return $user->hasAnyRole(['aosp', 'super-admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Beneficiary  $beneficiary
     * @return Response|bool
     */
    public function forceDelete(User $user, Beneficiary $beneficiary): Response|bool
    {
        return $user->hasAnyRole(['aosp', 'super-admin']);
    }
}
