<?php

namespace App\DataFixtures;

use App\Entity\Store\Brand;
use App\Entity\Store\Color;
use App\Entity\Store\Comment;
use App\Entity\Store\Image;
use App\Entity\Store\Product;
use App\Entity\User;
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

        $this->loadUsers();
        $this->loadBrands();
        $this->loadColors();
        $this->loadProducts();
        $this->loadComments();

        $this->manager->flush();
    }

    private function loadComments():void
    {
        $messages = [
            'Génial comme produit',
            'Produit super nul !',
            'Produit bon rapport qualité/prix',
            'Produit pas ouf.',
            'Vraiment bien !'
        ];

        for ($i = 1 ; $i < 15 ; $i++){
            /** @var Product $product */
            $product = $this->getReference(Product::class . $i);

            $commentsCount = random_int(0,20);
            for ($j = 0 ; $j < $commentsCount ; $j++){
                $comment = (new Comment())
                    ->setMessage($messages[array_rand($messages)])
                    ->setProduct($product)
                ;

                /** @var User $user */
                $user = $this->getReference(User::class . random_int(0,1));
                $comment->setUser($user);

                $this->manager->persist($comment);
            }
        }
    }

    private function loadBrands():void
    {
        $brands = [
                ['Adidas'],
                ['Asics'],
                ['Nike'],
                ['Puma']
            ];
        foreach ($brands as $key => [$name]){
            $brand = (new Brand())
                ->setName($name);

            $this->manager->persist($brand);
            $this->addReference(Brand::class . $key, $brand);
        }
    }

    private function loadColors():void
    {
        $colors = [
            ['Noir'],
            ['Blanc'],
            ['Rouge'],
            ['Bleu'],
            ['Vert']

        ];
        foreach ($colors as $key => [$name]){
            $color = (new Color())
                ->setName($name);

            $this->manager->persist($color);
            $this->addReference(Color::class . $key, $color);
        }
    }

    private function loadProducts(): void
    {

        for ($i = 1 ; $i < 15 ; $i++) {

            if ($i % 5 === 0){
                sleep(1);
            }

            $product = (new Product())
                ->setName('product ' . $i)
                ->setSlug('product ' . $i)
                ->setDescription('Produit de description ' . $i)
                ->setPrice(mt_rand(10, 100))
                ->setDescriptionLongue(
                    'Une description longue du produit sera affichée à cet endroit :
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                            qui officia deserunt mollit anim id est laborum');

            $image =(new Image())
                ->setUrl(sprintf('img/products/shoe-%d.jpg', $i))
                ->setAlt($product->getName());

            /** @var Brand $brand */
            $brand = $this->getReference(Brand::class . random_int(0, 3));
            $product->setBrand($brand);

            for ($j = 0 ; $j < 5 ; $j++){
                if ((bool) random_int(0, 1)){
                    /** @var Color $color */
                    $color = $this->getReference(Color::class . $j);
                    $product->addColor($color);
                }
            }

            $product->setImage($image);

            $this->manager->persist($product);

            $this->addReference(Product::class . $i, $product);
        }
    }

    private function loadUsers() : void
    {
        $users =
        [
            ['Jean', 'Azerty1?', ['ROLE_ADMIN']],
            ['Pierre', 'Azerty1?', []],
        ];

        foreach ($users as $key => [$username, $password, $roles]) {
            $user = (new User())
                ->setUsername($username)
                ->setRoles($roles)
            ;

            $encodedPassword = $this->encoder->encodePassword($user, $password);
            $user->setPassword($encodedPassword);

            $this->manager->persist($user);
            $this->addReference(User::class . $key, $user);
        }
    }
}
