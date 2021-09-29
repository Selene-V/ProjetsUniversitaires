<?php


namespace App\Manager;

use App\Entity\Contact;
use App\Event\ContactCreated;
use Doctrine\ORM\EntityManagerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

final class ContactManager
{

    private EventDispatcherInterface $eventDispatcher;
    private EntityManagerInterface $em;

    /**
     * ContactManager constructor.
     * @param EventDispatcherInterface $eventDispatcher
     * @param EntityManagerInterface $em
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param Contact $contact
     */
    public function insert(Contact $contact)
    {
        $this->em->persist($contact);
        $this->em->flush();

        $this->eventDispatcher->dispatch(new ContactCreated($contact));
    }
}
