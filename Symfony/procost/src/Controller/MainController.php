<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\EmployeeRepository;
use App\Repository\ProductionTimeRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class MainController extends AbstractController
{
    private ProjectRepository $projectRepository;
    private EmployeeRepository $employeeRepository;
    private ProductionTimeRepository $productionTimeRepository;

    /**
     * MainController constructor.
     * @param ProjectRepository $projectRepository
     * @param EmployeeRepository $employeeRepository
     * @param ProductionTimeRepository $productionTimeRepository
     */
    public function __construct(ProjectRepository $projectRepository, EmployeeRepository $employeeRepository, ProductionTimeRepository $productionTimeRepository)   {
        $this->projectRepository = $projectRepository;
        $this->employeeRepository = $employeeRepository;
        $this->productionTimeRepository = $productionTimeRepository;
    }


    /**
     * @Route("/", name="main_index")
     *
     */
    public function index(): Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->isGranted('ROLE_MANAGER') || $this->isGranted('ROLE_EMPLOYEE')) {

                $projectsInProgress = $this->projectRepository->countProjectsInProgress();
                $projectsDelivered = $this->projectRepository->countProjectsDelivered();
                $nbEmployees = $this->employeeRepository->countEmployees();
                $fiveLastProjects = $this->projectRepository->findFiveLastProjects();
                $nbHeuresProduction = $this->productionTimeRepository->sumNbHours();
                $tenLastProductionTime = $this->productionTimeRepository->findTenLastProductionTimeWithAllInformations();
                $nbProjetsRentables = $this->projectRepository->profitability();
                $topEmployee = $this->employeeRepository->findTopEmployee();
                return $this->render('main/main_homepage.html.twig', [
                    'projectsInProgress' => $projectsInProgress[1],
                    'projectsDelivered' => $projectsDelivered[1],
                    'nbEmployees' => $nbEmployees[1],
                    'fiveLastProjects' => $fiveLastProjects,
                    'nbHeuresProduction' => $nbHeuresProduction[1],
                    'tenLastProductionTime' => $tenLastProductionTime,
                    'nbProjetsRentables' => sizeof($nbProjetsRentables),
                    'topEmployee' => $topEmployee[0],
                ]);

            }
        }
        return $this->redirectToRoute('app_login');
    }
}
