<?php

namespace App\Action\API\User;

use App\Core\Controller\AbstractController;
use App\Serializer\ObjectSerializer;
use App\Service\UserManager;
use App\Entity\User;

class Persist extends AbstractController
{
    public function __invoke()
    {
        $userManager = new UserManager();

        $request = $this->getRequest();
        //$data = $request->getParsedBody();
        $data = $request->getBody()->getContents();

        $lserver = $request->getServerParams();
        $contentType = explode(';', $lserver['CONTENT_TYPE'])[0];

        $user = new User();

        $serializer = new ObjectSerializer();

        if ($contentType === "application/xml"){
            $xml   = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);
            $data = json_decode(json_encode((array)$xml), TRUE);

            $user->hydrate($data);
            $userManager->persist($user);

            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><data></data>');
            $serializer->toXml($data,$xml);
            $this->addHeader('Content-Type', 'application/xml');

            Mail::mail($user);

            return $xml->asXML();
        }else {
            $data = (array)json_decode($data);

            $user->hydrate($data);
            $userManager->persist($user);

            $this->addHeader('Content-Type', 'application/json');
            Mail::mail($user);

            return $serializer->toJson($user);
        }


    }
}
