<?php

namespace App\Membership\Dummy\Repository;

use App\Membership\Entity\Membership;
use App\Membership\Entity\NamedMembership;
use App\Membership\Repository\MembershipRepository;
use App\User;

class NamedMembershipRepository implements MembershipRepository
{
    /**
     * @param User $user
     *
     * @return Membership|null
     */
    public function findMembershipForUser(User $user): ?Membership
    {
        $membership = new NamedMembership();
        $membership->setId(1);
        $membership->setName('Basic membership');

        return $membership;
    }
}