<?php


namespace App\Controller;

use App\Entity\Store\Comment;
use App\Entity\User;
use App\Form\CommentType;
use App\Manager\ProductManager;
use App\Repository\Store\BrandRepository;
use App\Repository\Store\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class StoreController  extends AbstractController
{

    private ProductRepository $productRepository;
    private BrandRepository $brandRepository;
    private ProductManager $productManager;

    /**
     * StoreController constructor.
     * @param ProductRepository $productRepository
     * @param BrandRepository $brandRepository
     * @param ProductManager $productManager
     */
    public function __construct(ProductRepository $productRepository, BrandRepository $brandRepository, ProductManager $productManager)
    {
        $this->productManager = $productManager;
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
    }

    /**
     * @Route("/products", name="store_list_products", methods={"GET"})
     * @return Response
     */
    public function listProducts() : Response
    {
        $products = $this->productRepository->findAll();
        return $this->render('store/store_list_products.html.twig', [
            "products" => $products,
        ]);
    }

    /**
     * @Route("/products/brand/{brandId}", name="store_list_products_by_brand", requirements={"id" = "\d+"}, methods={"GET"})
     * @param int $brandId
     * @return Response
     */
    public function listProductsByBrand(int $brandId) :Response
    {
        $brand = $this->brandRepository->find($brandId);

        if ($brand === null){
            throw new NotFoundHttpException();
        }

        $products = $this->productRepository->findByBrand($brand);

        return $this->render('store/store_list_products.html.twig', [
            "products" => $products,
            "brand_id" => $brand->getId(),
        ]);

    }

    public function listBrandsMenu(int $brandId = null): Response
    {
        $brands = $this->brandRepository->findAll();

        return $this->render('store/_composant_brand.html.twig', [
            "brands" => $brands,
            "brand_id" => $brandId,
        ]);
    }

    /**
     * @Route("/store/product/{id}/details/{slug}", name="store_show_product", requirements={"id" = "\d+"}, methods={"GET", "POST"})
     * @param Request $request
     * @param int $id
     * @param string $slug
     * @return Response
     */
    public function showProduct(Request $request, int $id, string $slug): Response
    {
        $product = $this->productRepository->findOneWithAllInformations($id);
        if ($product === null){
            throw new NotFoundHttpException('Le produit d\'id ' . $id . ' n\'existe pas.');
        }

        if ($product->getSlug() !== $slug){
            return $this->redirectToRoute('store_show_product', [
               'id' => $id,
               'slug' => $product->getSlug(),
            ], Response::HTTP_MOVED_PERMANENTLY);
        }

        $user = $this->getUser();
        if ($user instanceof User) {
            $comment = new Comment();
            $comment->setUser($user);

            $form = $this->createForm(CommentType::class, $comment);
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $this->productManager->addComment($product, $comment);

                return $this->redirectToRoute('store_show_product', [
                    'id' => $id,
                    'slug' => $slug,
                ]);
            }
        }

        return $this->render('store/store_show_product.html.twig', [
            'product' => $product,
            'form' => isset($form) ? $form->createView() : null,
        ]);
    }
}
