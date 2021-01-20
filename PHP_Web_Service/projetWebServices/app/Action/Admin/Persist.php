<?php

namespace App\Action\User;

use App\Core\Controller\AbstractController;
use App\Serializer\ObjectSerializer;
use App\Service\AdminManager;
use App\Entity\Admin;

class Persist extends AbstractController
{
    public function __invoke()
    {
        $adminManager = new AdminManager();

        $request = $this->getRequest();

        $data = $request->getParsedBody();
        $admin = new Admin();
        $admin->setUsername($data['username']);
        $admin->setFirstName($data['firstName']);
        $admin->setLastName($data['lastName']);
        $admin->setEmail($data['email']);
        $admin->setPassword($data['password']);

        $admin->hydrate($data);

        $adminManager->persist($admin);

        $serializer = new ObjectSerializer();

        $this->addHeader('Content-Type', 'application/json');

        return $serializer->toJson($admin);
    }
}
