<?php

namespace App\Action\Message;

use App\Communication\Policy\ShowMessagePolicy;
use App\Communication\Repository\MessageRepository;
use App\User;
use Illuminate\Support\Collection;

class ShowMessagesHandler
{
    /** @var MessageRepository */
    private $messageRepository;

    /** @var ShowMessagePolicy */
    private $messagePolicy;

    /**
     * @param MessageRepository $messageRepository
     * @param ShowMessagePolicy $messagePolicy
     */
    public function __construct(MessageRepository $messageRepository, ShowMessagePolicy $messagePolicy)
    {
        $this->messageRepository = $messageRepository;
        $this->messagePolicy     = $messagePolicy;
    }

    /**
     * @param User $user
     *
     * @return Collection
     */
    public function showMessages(User $user): Collection
    {
        $messages     = $this->messageRepository->getMessagesByRecipient($user);
        $showMessages = new Collection();

        foreach ($messages as $message) {
            if ($this->messagePolicy->showMessageToUser($message, $user) === true) {
                $showMessages->push($message);
            }
        }

        return $showMessages;
    }
}