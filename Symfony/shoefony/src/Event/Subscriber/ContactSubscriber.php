<?php

namespace App\Event\Subscriber;

use App\Event\ContactCreated;
use App\Mailer\ContactMailer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class ContactSubscriber implements EventSubscriberInterface
{

    private ContactMailer $contactMailer;

    /**
     * ContactSubscriber constructor.
     * @param ContactMailer $contactMailer
     */
    public function __construct(ContactMailer $contactMailer)
    {
        $this->contactMailer = $contactMailer;
    }

    /**
     * @return \array[][]
     */
    public static function getSubscribedEvents():array
    {
        return [
            ContactCreated::class => [
                ['sendEmail', 10],
            ],
        ];
    }

    /**
     * @param ContactCreated $event
     */
    public function sendEmail(ContactCreated $event): void
    {
        $this->contactMailer->send($event->getContact());
    }
}
