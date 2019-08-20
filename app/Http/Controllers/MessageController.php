<?php

namespace App\Http\Controllers;

use App\Action\Message\ShowMessagesHandler;
use App\User;

class MessageController
{
    /** @var ShowMessagesHandler */
    private $showMessagesHandler;

    /**
     * @param ShowMessagesHandler $showMessagesHandler
     */
    public function __construct(ShowMessagesHandler $showMessagesHandler)
    {
        $this->showMessagesHandler = $showMessagesHandler;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $user     = new User();
        $messages = $this->showMessagesHandler->showMessages($user);

        return view('message_inbox', ['messages' => $messages->all(), 'currentUser' => $user]);
    }
}