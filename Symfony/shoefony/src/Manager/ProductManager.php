<?php


namespace App\Manager;

use App\Entity\Store\Comment;
use App\Entity\Store\Product;
use App\Event\CommentCreated;
use Doctrine\ORM\EntityManagerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

class ProductManager
{

    private EntityManagerInterface $em;
    private EventDispatcherInterface $eventDispatcher;

    /**
     * ProductManager constructor.
     * @param EventDispatcherInterface $eventDispatcher
     * @param EntityManagerInterface $em
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param Product $product
     * @param Comment $comment
     */
    public function addComment(Product $product, Comment $comment): void
    {
        $product->addComment($comment);
        $this->em->persist($comment);
        $this->em->flush();

        $this->eventDispatcher->dispatch(new CommentCreated($comment));
    }
}
