<?php

namespace Litecms\Faq\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Litecms\Faq\Models\Faq;

class FaqPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view the faq.
     *
     * @param User $user
     * @param Faq $faq
     *
     * @return bool
     */
    public function view(User $user, Faq $faq)
    {
        if ($user->canDo('faq.faq.view') && $user->is('admin')) {
            return true;
        }

        return $user->id === $faq->user_id;
    }

    /**
     * Determine if the given user can create a faq.
     *
     * @param User $user
     * @param Faq $faq
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('faq.faq.create');
    }

    /**
     * Determine if the given user can update the given faq.
     *
     * @param User $user
     * @param Faq $faq
     *
     * @return bool
     */
    public function update(User $user, Faq $faq)
    {
        if ($user->canDo('faq.faq.update') && $user->is('admin')) {
            return true;
        }

        return $user->id === $faq->user_id;
    }

    /**
     * Determine if the given user can delete the given faq.
     *
     * @param User $user
     * @param Faq $faq
     *
     * @return bool
     */
    public function destroy(User $user, Faq $faq)
    {
        if ($user->canDo('faq.faq.delete') && $user->is('admin')) {
            return true;
        }

        return $user->id === $faq->user_id;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperUser()) {
            return true;
        }
    }
}
