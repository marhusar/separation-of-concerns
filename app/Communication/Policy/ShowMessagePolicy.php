<?php

namespace App\Communication\Policy;

use App\Communication\Entity\Message;
use App\Membership\Repository\MembershipRepository;
use App\User;
use phpDocumentor\Reflection\Types\Boolean;

class ShowMessagePolicy
{
    /** @var MembershipRepository */
    private $membershipRepository;

    /**
     * @param MembershipRepository $membershipRepository
     */
    public function __construct(MembershipRepository $membershipRepository)
    {
        $this->membershipRepository = $membershipRepository;
    }

    /**
     * @param Message $message
     * @param User    $user
     *
     * @return bool
     */
    public function showMessageToUser(Message $message, User $user): bool
    {
        $result = $this->membershipRepository->findMembershipForUser($user);

        if ($result !== null) {
            return true;
        }

        return false;
    }
}