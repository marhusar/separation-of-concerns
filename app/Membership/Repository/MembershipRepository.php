<?php

namespace App\Membership\Repository;

use App\Membership\Entity\Membership;
use App\User;

interface MembershipRepository
{
    /**
     * @param User $user
     *
     * @return Membership|null
     */
    public function findMembershipForUser(User $user): ?Membership;
}