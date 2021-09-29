<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use App\Entity\Metier;
use App\Entity\ProductionTime;
use App\Entity\Project;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private ObjectManager $manager;
    private UserPasswordEncoderInterface $encoder;

    /**
     * AppFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        // load de toutes les fixtures
        $this->loadMetiers();
        $this->loadEmployees();
        $this->loadUsers();
        $this->loadProjects();
        $this->loadTempsProduction();

        $this->manager->flush();
    }

    private function loadMetiers():void
    {
        $metiers = [
            ['Développeur Java'],
            ['Développeur PHP'],
            ['Développeur JS'],
            ['Développeur Node'],
            ['Développeur Angular'],
            ['Développeur Android'],
            ['Développeur Flutter'],
            ['Développeur ReactJS'],
            ['Développeur C'],
            ['Développeur Vue'],
            ['Développeur C++']
        ];
        foreach ($metiers as $key => [$nom]){
            $metier = (new Metier())
                ->setNom($nom);

            $this->manager->persist($metier);
            $this->addReference(Metier::class . $key, $metier);
        }
    }

    private function loadEmployees(): void
    {
        $employees = [
            ['Jane', 'Doe', 'janedoe@gmail.com', 10.58],
            ['Michel', 'Brock', 'michelbrock@gmail.com', 3.17],
            ['Patrick', 'Moor', 'patrickmoor@gmail.com', 9.79],
            ['Salim', 'Sam', 'salimsam@gmail.com', 7.34],
            ['Sarah', 'Clint', 'sarahclint@gmail.com', 19.99],
            ['Amanda', 'Peck', 'amandapeck@gmail.com', 16.10],
            ['Franck', 'Ramos', 'franckramos@gmail.com', 9.49],
            ['Daisy', 'Matthews', 'daisymattews@gmail.com', 29.73],
            ['Harold', 'Herrera', 'haroldherrera@gmail.com', 1.41],
            ['Flenn', 'Blutter', 'flennblutter@gmail.com', 9.45],
            ['Robin', 'Riley', 'robinriley@gmail.com', 16.82],
            ['Rick', 'Forn', 'rickforn@gmail.com', 29.67]
        ];

        foreach ($employees as $key => [$prenom, $nom, $email, $coutHoraire]){
            $employee = (new Employee())
                ->setPrenom($prenom)
                ->setNom($nom)
                ->setMail($email)
                ->setCoutHoraire($coutHoraire)
                ->setDateEmbauche(new DateTime())
            ;

            /** @var Metier $metier */
            $metier = $this->getReference(Metier::class . random_int(0, 10));
            $employee->setMetier($metier);

            $this->manager->persist($employee);

            $this->addReference(Employee::class . $key, $employee);
        }
    }

    private function loadProjects(): void
    {
        // Datetime(Y-m-d)
        $projects = [
            ['Projet magasin de fruits', 'Lorem ipsum dolor sit amet consectetur adipiscing elit', 100.00, null],
            ['Projet agence immobilière', 'Pellentesque vitae velit ex', 2.02, '2021-01-25'],
            ['Projet magasin chaussures', 'Mauris dapibus risus quis suscipit vulputate', 10500.57, '2021-11-13'],
            ['Projet boulangerie', 'Eros diam egestas libero eu vulputate risus', 1.12, null],
            ['Projet magasin maquillage', 'Morbi blandit turpis nunc, a elementum odio lacinia vitae', 1987.61, null],
            ['Projet peintre', 'Aliquam et augue est', 50369.84, null],
            ['Projet restaurant du square', 'Donec sit amet felis et augue varius aliquam nec a tortor', 7394.37, null],
            ['Projet animalerie', 'Vestibulum auctor tincidunt aliquam', 151.36, '2021-12-04'],
            ['Projet bar Le P\'tit coup', 'Aliquam rhoncus maximus arcu vitae varius. Fusce eget nulla mi', 64324.97, null],
            ['Projet lycée Marie Curie', 'Donec metus mauris, auctor ac aliquet et, dignissim id purus', 1.97, '2021-03-30'],
            ['Projet Collège Saint Léon', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Interdum et malesuada fames ac ante ipsum primis in faucibus', 5669.48, '2021-07-29'],
            ['Projet chocolaterie', 'Proin dignissim efficitur ultrices', 6.17, '2021-09-05']
        ];

        foreach ($projects as $key => [$nom, $description, $prixVente, $dateLivraison]){
            sleep(1);

            $project = (new Project())
                ->setNom($nom)
                ->setDescription($description)
                ->setPrixVente($prixVente)
            ;

            if ($dateLivraison === null){
                $project->setDateLivraison(null);
            } else {
                $project->setDateLivraison(new DateTime($dateLivraison));
            }

            $this->manager->persist($project);

            $this->addReference(Project::class . $key, $project);
        }
    }

    private function loadTempsProduction(): void
    {
        $productTimes = [
            [1],
            [3],
            [4],
            [2],
            [6],
            [7],
            [1],
            [4],
            [6],
            [5],
            [3],
            [1],
            [12],
            [8],
            [4],
            [6],
            [8],
            [2],
            [1],
            [6],
            [1],
            [4],
            [7],
            [3],
            [3],
            [6],
            [2]
        ];
            // Permet d'ajouter au moins 1 temps de production de 2h à chaques projet, pour eviter de se retrouver avec un projet livré sans temps de production ajouté
            for ($i = 0 ; $i<12 ; $i++){
                sleep(1);

                /** @var Project $project */
                $project = $this->getReference(Project::class . $i);

                /** @var Employee $employee */
                $employee = $this->getReference(Employee::class . $i);

                $productTime = (new ProductionTime())
                    ->setProject($project)
                    ->setEmployee($employee)
                    ->setNbHeures(2)
                ;

                $this->manager->persist($productTime);
            }

            // Ajoute d'autres temps de productions au hasard
            foreach ($productTimes as $key => [$nbHeures]){
            sleep(1);

            /** @var Project $project */
            $project = $this->getReference(Project::class . random_int(0,10));

            /** @var Employee $employee */
            $employee = $this->getReference(Employee::class . random_int(0,10));

            $productTime = (new ProductionTime())
                ->setProject($project)
                ->setEmployee($employee)
                ->setNbHeures($nbHeures)
            ;

            $this->manager->persist($productTime);
        }
    }

    private function loadUsers() : void
    {
        $users =
            [
                ['Manager1?', ['ROLE_MANAGER']],
                ['Employee1?', ['ROLE_EMPLOYEE']],
            ];

        for ($i = 0; $i<11 ; $i++){
            $roleOfUser = random_int(0, 1);

            $user = (new User())
                ->setRoles($users[$roleOfUser][1])
            ;

            $encodedPassword = $this->encoder->encodePassword($user, $users[$roleOfUser][0]);
            $user->setPassword($encodedPassword);

            /** @var Employee $employee */
            $employee = $this->getReference(Employee::class . $i);
            $user->setEmployee($employee);

            $user->setEmail($employee->getMail());

            $this->manager->persist($user);
        }
    }
}
