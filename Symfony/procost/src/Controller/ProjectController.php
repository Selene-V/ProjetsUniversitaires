<?php

namespace App\Controller;

use App\Entity\ProductionTime;
use App\Entity\Project;
use App\Entity\User;
use App\Form\ProductionTimeProjectForEmployeeConnectedType;
use App\Form\ProductionTimeProjectType;
use App\Form\ProjectType;
use App\Manager\ProductionTimeManager;
use App\Manager\ProjectManager;
use App\Repository\ProductionTimeRepository;
use App\Repository\ProjectRepository;
use DateTime;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/project", name="project_")
 */
class ProjectController extends AbstractController
{
    private ProjectRepository $projectRepository;
    private ProjectManager $projectManager;
    private ProductionTimeRepository $productionTimeRepository;
    private ProductionTimeManager $productionTimeManager;

    /**
     * ProjectController constructor.
     * @param ProjectRepository $projectRepository
     * @param ProjectManager $projectManager
     * @param ProductionTimeRepository $productionTimeRepository
     * @param ProductionTimeManager $productionTimeManager
     */
    public function __construct(ProjectRepository $projectRepository, ProjectManager $projectManager, ProductionTimeRepository $productionTimeRepository, ProductionTimeManager $productionTimeManager)
    {
        $this->projectRepository = $projectRepository;
        $this->projectManager = $projectManager;
        $this->productionTimeRepository = $productionTimeRepository;
        $this->productionTimeManager = $productionTimeManager;
    }

    /**
     * @Route("/{page?1}", name="list", requirements={"page" = "\d+"}, methods={"GET"})
     * @param int|null $page
     * @return Response
     * @throws NonUniqueResultException
     */
    public function listProjects(?int $page): Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->isGranted('ROLE_MANAGER') || $this->isGranted('ROLE_EMPLOYEE')) {

                $projects = $this->projectRepository->findAllByPage($page);
                $nbPages = ceil($this->projectRepository->countAllProjects()[1] / 10);
                $url = '/project/';
                return $this->render('project/project_list.html.twig', [
                    "projects" => $projects,
                    "nbPages" => $nbPages,
                    "url" => $url,
                    "currentPage" => $page
                ]);
            }
        }
        return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("/show/{id}/{page?1}", name="show_one", requirements={"id" = "\d+", "page" = "\d+"}, methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @param int|null $page
     * @return Response
     * @throws NonUniqueResultException
     */
    public function showProject(Request $request, int $id, ?int $page): Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->isGranted('ROLE_MANAGER') || $this->isGranted('ROLE_EMPLOYEE')) {

                $project = $this->projectRepository->find($id);

                $nbEmployeeByProject = $this->productionTimeRepository->employeeByProject($id);

                $productionsTimes = $this->productionTimeRepository->findProductionsTimesByProjectByPage($id, $page);

                $nbPages = ceil($this->productionTimeRepository->countAllProductionsTimesByProject($id)[1] / 5);
                $url = '/project/show/' . $id . '/';

                if ($project === null) {
                    throw new NotFoundHttpException('Le projet d\'id ' . $id . ' n\'existe pas.');
                }
                $productionTime = new ProductionTime();
                if ($this->isGranted('ROLE_MANAGER')){
                    $form = $this->createForm(ProductionTimeProjectType::class, $productionTime);
                } else {
                    $productionTime->setEmployee($this->getUser()->getEmployee());
                    $form = $this->createForm(ProductionTimeProjectForEmployeeConnectedType::class, $productionTime);
                }
                $form->handleRequest($request);
                $productionTime->setProject($project);

                if ($form->isSubmitted() && $form->isValid()) {
                    $this->productionTimeManager->insert($productionTime);

                    $this->addFlash(
                        'success',
                        'Le temps de production a bien été créé !',
                    );

                    return $this->redirectToRoute('project_show_one', [
                        'id' => $id,
                    ]);

                }
                return $this->render('project/project_show_one.html.twig', [
                    "project" => $project,
                    'productionsTimes' =>$productionsTimes,
                    'nbEmployeeByProject' => $nbEmployeeByProject,
                    'form' => $form->createView(),
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
    public function modifyProject(Request $request, int $id): Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->isGranted('ROLE_MANAGER')) {

                $project = $this->projectRepository->find($id);
                if ($project->getDateLivraison() == null) {
                    $form = $this->createForm(ProjectType::class, $project);
                    $form->handleRequest($request);

                    if ($form->isSubmitted() && $form->isValid()) {
                        $this->projectManager->update();

                        $this->addFlash(
                            'success',
                            'Les modifications ont bien été prises en compte.',
                        );

                        return $this->redirectToRoute('project_list');
                    }

                    return $this->render('project/project_edit.html.twig', [
                        'project' => $project,
                        'form' => $form->createView()
                    ]);
                } else {
                    $this->addFlash(
                        'warning',
                        'Le projet a été livré et ne peut plus être modifié ',
                    );
                    return $this->redirectToRoute('project_list');
                }
            }
        }
        return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("/create", name="create", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function createProject(Request $request): Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->isGranted('ROLE_MANAGER')) {

                $project = new Project();
                $form = $this->createForm(ProjectType::class, $project);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $this->projectManager->insert($project);

                    $this->addFlash(
                        'success',
                        'Le projet a bien été créé !',
                    );

                    return $this->redirectToRoute('project_list');
                }

                return $this->render('project/project_edit.html.twig', [
                    'project' => $project,
                    'form' => $form->createView()
                ]);
            }
        }
        return $this->redirectToRoute('app_login');
    }

    /**
     * @Route("/delivery/{id}", name="delivery", requirements={"id" = "\d+"}, methods={"GET", "POST"})
     * @param int $id
     * @return Response
     */
    public function deliveryProject(int $id) : Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->isGranted('ROLE_MANAGER')) {
                $project = $this->projectRepository->find($id);
                if ($project->getDateLivraison() === null) {
                    $project->setDateLivraison(new DateTime());
                }
                $this->projectManager->update();

                return $this->redirectToRoute('project_list');
            }
        }
        return $this->redirectToRoute('app_login');
    }
}
