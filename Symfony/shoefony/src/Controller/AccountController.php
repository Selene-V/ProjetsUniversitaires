<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/my-account", name="account_")
 */
class AccountController extends AbstractController
{

    /**
     * @Route("", name="show")
     * @return Response
     */
    public function show():Response
    {
        return $this->render('account/show.html.twig');
    }

    /**
     * @Route("/settings", name="settings")
     * @return Response
     */
    public function settings(): Response
    {
        return $this->render('account/settings.html.twig');
    }
}
