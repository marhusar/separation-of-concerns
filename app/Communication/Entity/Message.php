<?php
namespace App\Communication\Entity;

use App\User;

interface Message
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return User
     */
    public function getSender();

    /**
     * @return User
     */
    public function getRecipient();

    /**
     * @return string
     */
    public function getBody();
}