<?php

namespace App\Policies;

use App\Categorie;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the categorie.
     *
     * @param  \App\User  $user
     * @param  \App\Categorie  $categorie
     * @return mixed
     */
    public function view(User $user, Categorie $categorie)
    {
        //
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the categorie.
     *
     * @param  \App\User  $user
     * @param  \App\Categorie  $categorie
     * @return mixed
     */
    public function update(User $user, Categorie $categorie)
    {
        //
    }

    /**
     * Determine whether the user can delete the categorie.
     *
     * @param  \App\User  $user
     * @param  \App\Categorie  $categorie
     * @return mixed
     */
    public function delete(User $user, Categorie $categorie)
    {
        //
    }

    /**
     * Determine whether the user can restore the categorie.
     *
     * @param  \App\User  $user
     * @param  \App\Categorie  $categorie
     * @return mixed
     */
    public function restore(User $user, Categorie $categorie)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the categorie.
     *
     * @param  \App\User  $user
     * @param  \App\Categorie  $categorie
     * @return mixed
     */
    public function forceDelete(User $user, Categorie $categorie)
    {
        //
    }
}
