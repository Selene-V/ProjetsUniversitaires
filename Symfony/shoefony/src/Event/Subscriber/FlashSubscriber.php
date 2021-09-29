<?php

namespace App\Event\Subscriber;

use App\Event\ContactCreated;
use App\Event\CommentCreated;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

final class FlashSubscriber implements EventSubscriberInterface
{

    private FlashBagInterface $flashBag;

    /**
     * FlashSubscriber constructor.
     * @param FlashBagInterface $flashBag
     */
    public function __construct(FlashBagInterface $flashBag)
    {
        $this->flashBag = $flashBag;
    }

    /**
     * @return \array[][]
     */
    public static function getSubscribedEvents():array
    {
        return [
            ContactCreated::class => [
                ['addContactCreatedFlash', -100],
            ],
            CommentCreated::class => [
                ['addCommentCreatedFlash', -100],
            ],
        ];
    }

    /**
     * @param ContactCreated $event
     */
    public function addContactCreatedFlash(ContactCreated $event): void
    {
        $this->addSuccessFlash('Merci, votre message a été pris en compte !');
    }

    /**
     * @param CommentCreated $event
     */
    public function addCommentCreatedFlash(CommentCreated $event): void
    {
        $user = $event->getComment()->getUser();
        if ($user === null){
            throw new \LogicException('L\'utilisateur ne peut pas être null !');
        }
        $this->addSuccessFlash('Merci, votre commentaire a été pris en compte !');
    }

    /**
     * @param string $message
     */
    private function addSuccessFlash(string $message)
    {
        $this->flashBag->add('success', $message);
    }
}
