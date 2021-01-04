<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_homepage")
     */
    public function homepage(): Response
    {
        $url = $this->generateUrl('main_homepage');
        $host = 'http://symfony';
        $url = $host . $url;

        return $this->render('main/main_homepage.html.twig', [
            'controller_name' => 'Main_homepage',
            'url' => $url
        ]);
    }

    /**
     * @Route("/presentation", name="main_presentation")
     */
    public function presentation(): Response
    {
        $url = $this->generateUrl('main_presentation');
        $host = 'http://symfony';
        $url = $host . $url;

        return $this->render('main/main_presentation.html.twig', [
            'controller_name' => 'Main_presentation',
            'url' => $url
        ]);
    }

    /**
     * @Route("/contact", name="main_contact")
     */
    public function contact(): Response
    {
        $url = $this->generateUrl('main_contact');
        $host = 'http://symfony';
        $url = $host . $url;

        return $this->render('main/main_contact.html.twig', [
            'controller_name' => 'Main_contact',
            'url' => $url
        ]);
    }
}
