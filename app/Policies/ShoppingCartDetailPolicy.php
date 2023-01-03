<?php

namespace App\Policies;

use App\Models\ShoppingCartDetail;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShoppingCartDetailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }
}
