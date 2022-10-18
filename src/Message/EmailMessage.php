<?php

namespace App\Message;

class EmailMessage
{
    private $from;

    public function __construct(string $from)
    {
        $this->from = $from;
    }

    public function getFrom(): string
    {
        return $this->from;
    }
}
