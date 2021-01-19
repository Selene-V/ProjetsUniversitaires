<?php


namespace App\Manager;

use App\Entity\Contact;
use App\Mailer\ContactMailer;
use Doctrine\ORM\EntityManagerInterface;

class ContactManager
{
    private EntityManagerInterface $em;
    private ContactMailer $contactMailer;

    public function __construct(EntityManagerInterface $em, ContactMailer $contactMailer)
    {
        $this->em = $em;
        $this->contactMailer = $contactMailer;
    }

    public function insert(Contact $contact)
    {
        // Etape 1 : On "persiste" l'entité
        $this->em->persist($contact);

        // Etape 2 : On "flush" tout ce qui a été persisté avant
        $this->em->flush();

        $this->contactMailer->send($contact);
    }
}