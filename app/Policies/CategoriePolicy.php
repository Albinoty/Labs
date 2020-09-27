<?php

namespace App\Policies;

use App\Article;
use App\Categorie;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if($user->role == "admin")
            return true;
    }

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
        if($user->role == "editeur")
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can update the categorie.
     *
     * @return mixed
     */
    public function update()
    {
        return false;
    }

    /**
     * Determine whether the user can delete the categorie.
     *s
     * @return mixed
     */
    public function delete()
    {
        return false;
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
