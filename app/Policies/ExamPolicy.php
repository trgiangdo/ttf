<?php

namespace App\Policies;

use App\Exam;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExamPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Exam  $exam
     * @return mixed
     */
    public function view(User $user, Exam $exam)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role >= 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Exam  $exam
     * @return mixed
     */
    public function update(User $user, Exam $exam)
    {
        return $user->role >= 1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Exam  $exam
     * @return mixed
     */
    public function delete(User $user, Exam $exam)
    {
        return $user->role >= 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Exam  $exam
     * @return mixed
     */
    public function restore(User $user, Exam $exam)
    {
        return $user->role >= 1;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Exam  $exam
     * @return mixed
     */
    public function forceDelete(User $user, Exam $exam)
    {
        return $user->role >= 1;
    }
}
