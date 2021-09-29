<?php

namespace App\Controller;

use App\Entity\Metier;
use App\Entity\User;
use App\Form\MetierType;
use App\Manager\MetierManager;
use App\Repository\EmployeeRepository;
use App\Repository\MetierRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/metier", name="metier_")
 */
class MetierController extends AbstractController
{
    private MetierRepository $metierRepository;
    private MetierManager $metierManager;
    private EmployeeRepository $employeeRepository;

    /**
     * MetierController constructor.
     * @param MetierRepository $metierRepository
     * @param MetierManager $metierManager
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(MetierRepository $metierRepository, MetierManager $metierManager, EmployeeRepository $employeeRepository)
    {
        $this->metierRepository = $metierRepository;
        $this->employeeRepository = $employeeRepository;
        $this->metierManager = $metierManager;
    }

    /**
     * @Route("/{page?1}", name="list", requirements={"page" = "\d+"}, methods={"GET"})
     * @param int|null $page
     * @return Response
     * @throws NonUniqueResultException
     */
    public function listMetiers(?int $page): Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->isGranted('ROLE_MANAGER') || $this->isGranted('ROLE_EMPLOYEE')) {

                $metiers = $this->metierRepository->findAllByPage($page);
                $nbPages = ceil($this->metierRepository->countAllMetiers()[1] / 10);
                $url = '/metier/';
                return $this->render('metier/metier_list.html.twig', [
                    "metiers" => $metiers,
                    "nbPages" => $nbPages,
                    "url" => $url,
                    "currentPage" => $page
                ]);
            }
        }
        return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("/modify/{id}", name="modify", requirements={"id" = "\d+"}, methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function modifyMetier(Request $request, int $id): Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->isGranted('ROLE_MANAGER')) {
                $metier = $this->metierRepository->find($id);
                $form = $this->createForm(MetierType::class, $metier);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $this->metierManager->update();

                    $this->addFlash(
                        'success',
                        'Les modifications ont bien été prises en compte.',
                    );

                    return $this->redirectToRoute('metier_list');
                }

                return $this->render('metier/metier_edit.html.twig', [
                    'metier' => $metier,
                    'form' => $form->createView()
                ]);
            }
        }
        return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("/create", name="create", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function createMetier(Request $request): Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->isGranted('ROLE_MANAGER')) {
                $metier = new Metier();
                $form = $this->createForm(MetierType::class, $metier);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $this->metierManager->insert($metier);

                    $this->addFlash(
                        'success',
                        'Le métier a bien été créé !',
                    );

                    return $this->redirectToRoute('metier_list');
                }

                return $this->render('metier/metier_edit.html.twig', [
                    'metier' => $metier,
                    'form' => $form->createView()
                ]);
            }
        }
        return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("/delete/{id}", name="delete", requirements={"id" = "\d+"}, methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function deleteMetier(Request $request, int $id): Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->isGranted('ROLE_MANAGER')) {

                $metier = $this->metierRepository->find($id);

                $relie = $this->employeeRepository->countNumberEmployeeByMetier($id)[1];

                if ($relie == 0) {
                    $this->metierManager->delete($metier);

                    $this->addFlash(
                        'success',
                        'Le métier a bien été supprimé !',
                    );

                    return $this->redirectToRoute('metier_list');
                } else {
                    $this->addFlash(
                        'warning',
                        'Ce métier ne peut être supprimé car des employés l\'exercent !',
                    );

                    return $this->redirectToRoute('metier_list');
                }
            }
        }
        return $this->redirectToRoute('app_login');
    }
}
