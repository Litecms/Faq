<?php

namespace Litecms\Faq\Policies;

use Litepie\User\Contracts\UserPolicy;
use Litecms\Faq\Models\Faq;

class FaqPolicy
{

    /**
     * Determine if the given user can view the faq.
     *
     * @param UserPolicy $user
     * @param Faq $faq
     *
     * @return bool
     */
    public function view(UserPolicy $user, Faq $faq)
    {
        if ($user->canDo('faq.faq.view') && $user->isAdmin()) {
            return true;
        }

        return $faq->user_id == user_id() && $faq->user_type == user_type();
    }

    /**
     * Determine if the given user can create a faq.
     *
     * @param UserPolicy $user
     * @param Faq $faq
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('faq.faq.create');
    }

    /**
     * Determine if the given user can update the given faq.
     *
     * @param UserPolicy $user
     * @param Faq $faq
     *
     * @return bool
     */
    public function update(UserPolicy $user, Faq $faq)
    {
        if ($user->canDo('faq.faq.edit') && $user->isAdmin()) {
            return true;
        }

        return $faq->user_id == user_id() && $faq->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given faq.
     *
     * @param UserPolicy $user
     * @param Faq $faq
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Faq $faq)
    {
        return $faq->user_id == user_id() && $faq->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given faq.
     *
     * @param UserPolicy $user
     * @param Faq $faq
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Faq $faq)
    {
        if ($user->canDo('faq.faq.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given faq.
     *
     * @param UserPolicy $user
     * @param Faq $faq
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Faq $faq)
    {
        if ($user->canDo('faq.faq.approve')) {
            return true;
        }

        return false;
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
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
