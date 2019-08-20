<?php

namespace App\Membership\Entity;

interface Membership
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();
}