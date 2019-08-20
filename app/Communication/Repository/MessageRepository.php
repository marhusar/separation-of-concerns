<?php

namespace App\Communication\Repository;

use App\User;
use Illuminate\Support\Collection;

interface MessageRepository
{
    /**
     * @param User $user
     *
     * @return Collection
     */
    public function getMessagesByRecipient(User $user): Collection;
}