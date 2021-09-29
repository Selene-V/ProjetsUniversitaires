<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Manager\ContactManager;
use App\Repository\Store\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    private ContactManager $contactManager;
    private ProductRepository $productRepository;


    /**
     * MainController constructor.
     * @param ContactManager $contactManager
     * @param ProductRepository $productRepository
     */
    public function __construct(ContactManager $contactManager, ProductRepository $productRepository){
        $this->contactManager = $contactManager;
        $this->productRepository = $productRepository;
    }

    /**
     * @Route("/", name="main_homepage")
     * @return Response
     */
    public function homepage(): Response
    {
        $fourLastProduct = $this->productRepository->findFourLastProducts();
        $mostPopularProducts = $this->productRepository->findMostPopularProducts();
        return $this->render('main/main_homepage.html.twig', [
            'fourLastProduct' => $fourLastProduct,
            'mostPopularProducts' => $mostPopularProducts,
        ]);
    }

    /**
     * @Route("/presentation", name="main_presentation")
     * @return Response
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
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->contactManager->insert($contact);

            return $this->redirectToRoute('main_contact');
        }

        return $this->render('main/main_contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
