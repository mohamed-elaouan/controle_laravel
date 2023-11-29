<?php

namespace App\Policies;

use App\Models\Produits;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Type\TrueType;

class ProduitsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Produits $produits): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Produits $produits)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */ //User $user, Produits $produits
    public function update(User $user, Produits $produits)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    //, Produits $produits
    public function delete(User $user, Produits $produits): bool
    {
        return $user->role === "Admin";
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Produits $produits): bool
    {
        return $user->role === "Admin";
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Produits $produits): bool
    {
        return $user->role === "Admin";
    }
}
