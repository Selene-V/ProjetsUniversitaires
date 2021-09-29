<?php


namespace App\Controller;

use App\Entity\Employee;
use App\Entity\ProductionTime;
use App\Entity\User;
use App\Form\EmployeeType;
use App\Form\ProductionTimeEmployeeType;
use App\Manager\EmployeeManager;
use App\Manager\ProductionTimeManager;
use App\Repository\EmployeeRepository;
use App\Repository\ProductionTimeRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
/**
 * @Route("/employee", name="employee_")
 */
class EmployeeController extends AbstractController
{
    private EmployeeRepository $employeeRepository;
    private EmployeeManager $employeeManager;
    private ProductionTimeRepository $productionTimeRepository;
    private ProductionTimeManager $productionTimeManager;

    /**
     * EmployeeController constructor.
     * @param EmployeeRepository $employeeRepository
     * @param EmployeeManager $employeeManager
     * @param ProductionTimeRepository $productionTimeRepository
     * @param ProductionTimeManager $productionTimeManager
     */
    public function __construct(EmployeeRepository $employeeRepository, EmployeeManager $employeeManager, ProductionTimeRepository $productionTimeRepository, ProductionTimeManager $productionTimeManager)
    {
        $this->employeeRepository = $employeeRepository;
        $this->employeeManager = $employeeManager;
        $this->productionTimeRepository = $productionTimeRepository;
        $this->productionTimeManager = $productionTimeManager;
    }

    /**
     * @Route("/{page?1}", name="list", requirements={"page" = "\d+"}, methods={"GET"})
     * @param int|null $page
     * @return Response
     * @throws NonUniqueResultException
     */
    public function listEmployees(?int $page): Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->isGranted('ROLE_MANAGER') || $this->isGranted('ROLE_EMPLOYEE')) {

                $employees = $this->employeeRepository->findAllByPage($page);
                $nbPages = ceil($this->employeeRepository->countAllEmployees()[1] / 10);
                $url = '/employee/';

                return $this->render('employee/employee_list.html.twig', [
                    "employees" => $employees,
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
    public function showEmployee(Request $request, int $id, ?int $page): Response
    {
        if ($this->getUser() instanceof User){
            if ($this->isGranted('ROLE_MANAGER') || ($this->getUser()->getEmployee()->getId() == $id)){
                $employee = $this->employeeRepository->findOneWithMetier($id);

                $productionsTimes = $this->productionTimeRepository->findProductionsTimesByEmployeeByPage($id, $page);
                $nbPages = ceil($this->productionTimeRepository->countAllProductionsTimesByEmployee($id)[1]/5);
                $url = '/employee/show/' . $id . '/';

                if ($employee === null){
                    throw new NotFoundHttpException('L\'employé d\'id ' . $id . ' n\'existe pas.');
                }

                $productionTime = new ProductionTime();
                $form = $this->createForm(ProductionTimeEmployeeType::class, $productionTime);
                $form->handleRequest($request);
                $productionTime->setEmployee($employee);
                if($form->isSubmitted() && $form->isValid()){
                    $this->productionTimeManager->insert($productionTime);

                    $this->addFlash(
                        'success',
                        'Le temps de production a bien été créé !',
                    );

                    return $this->redirectToRoute('employee_show_one', [
                        'id' => $id,
                    ]);
                }

                return $this->render('employee/employee_show_one.html.twig', [
                    'employee' => $employee,
                    'productionsTimes' =>$productionsTimes,
                    'form' => $form->createView(),
                    'nbPages' => $nbPages,
                    'url' => $url,
                    'currentPage' => $page
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
    public function modifyEmployee(Request $request, int $id): Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->getUser()->getEmployee()->getId() == $id) {

                $employee = $this->employeeRepository->find($id);
                $form = $this->createForm(EmployeeType::class, $employee);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $this->employeeManager->update();

                    $this->addFlash(
                        'success',
                        'Les modifications ont bien été prises en compte.',
                    );

                    return $this->redirectToRoute('employee_list');
                }

                return $this->render('employee/employee_edit.html.twig', [
                    'employee' => $employee,
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
    public function createEmployee(Request $request): Response
    {
        if ($this->getUser() instanceof User) {
            if ($this->isGranted('ROLE_MANAGER')) {

                $employee = new Employee();
                $form = $this->createForm(EmployeeType::class, $employee);
                $form->handleRequest($request);

                if ($form->isSubmitted() && $form->isValid()) {
                    $this->employeeManager->insert($employee);

                    $this->addFlash(
                        'success',
                        'L\'employé a bien été créé !',
                    );

                    return $this->redirectToRoute('employee_list');
                }

                return $this->render('employee/employee_edit.html.twig', [
                    'employee' => $employee,
                    'form' => $form->createView()
                ]);
            }
        }
        return $this->redirectToRoute('app_login');
    }
}
