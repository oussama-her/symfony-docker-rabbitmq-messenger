<?php

namespace App\MessageHandler;

use App\Message\EmailMessage;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class EmailHandler
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function __invoke(EmailMessage $message)
    {
        $email = (new Email())
            ->from($message->getFrom())
            ->to('test@example.com')
            ->subject('From : '. $message->getFrom())
            ->html('<p>' . 'test' . '</p>');

        sleep(10);

        $this->mailer->send($email);
    }
}
