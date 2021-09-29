<?php

namespace App\Event;

use App\Entity\Contact;

final class ContactCreated
{

    private Contact $contact;

    /**
     * ContactCreated constructor.
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }
}
