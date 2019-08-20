<?php

namespace App\Communication\Dummy\Repository;

use App\Communication\Entity\SignedMessage;
use App\Communication\Repository\MessageRepository;
use App\User;
use Illuminate\Support\Collection;

class SignedMessageRepository implements MessageRepository
{
    /**
     * @param User $user
     *
     * @return Collection
     */
    public function getMessagesByRecipient(User $user): Collection
    {
        $message = new SignedMessage();
        $message->setBody('Hello from Slovakia');

        $message2 = new SignedMessage();
        $message2->setBody('Hello from Germany');

        $message3 = new SignedMessage();
        $message3->setBody('Hello from France');

        return new Collection([$message, $message2, $message3]);
    }
}