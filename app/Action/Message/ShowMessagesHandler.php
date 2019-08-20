<?php

namespace App\Action\Message;

use App\Communication\Repository\MessageRepository;
use App\User;
use Illuminate\Support\Collection;

class ShowMessagesHandler
{
    /** @var MessageRepository */
    private $messageRepository;

    /**
     * @param MessageRepository $messageRepository
     */
    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    /**
     * @param User $user
     *
     * @return Collection
     */
    public function showMessages(User $user): Collection
    {
        $messages = $this->messageRepository->getMessagesByRecipient($user);

        return $messages;
    }
}