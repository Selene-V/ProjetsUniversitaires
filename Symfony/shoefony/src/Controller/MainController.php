<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Manager\ContactManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /** @var ContactManager * */
    private ContactManager $contactManager;

    /**
     * MainController constructor.
     * @param ContactManager $contactManager
     */
    public function __construct(ContactManager $contactManager){
        $this->contactManager = $contactManager;
    }

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
     * @Route("/contact", name="main_contact", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function contact(Request $request): Response
    {
        // Création de notre entité et du formulaire basé dessus
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        // Demande au formulaire d'interpréter la Request
        $form->handleRequest($request);

        // Dans le cas de la soumission d'un formulaire valide
        if ($form->isSubmitted() && $form->isValid()){
            // Actions à effecter après envoi du formulaire
            $this->addFlash('success', 'Merci, votre message à été pris en compte !');

            $this->contactManager->insert($contact);

            return $this->redirectToRoute('main_contact');
        }


        return $this->render('main/main_contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
