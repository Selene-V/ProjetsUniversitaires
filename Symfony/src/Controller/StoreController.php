<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class StoreController  extends AbstractController
{
    /**
     * @Route("/products", name="store_list_products", methods={"GET"})
     * @return Response
     */
    public function listProducts() : Response
    {
        return $this->render('store/store_list_products.html.twig');
    }


    /**
     * @Route("/store/product/{id}/details/{slug}", name="store_show_product", requirements={"id" = "\d+"}, methods={"GET"})
     * @param Request $request
     * @param int $id
     * @param string $slug
     * @return Response
     */
    public function showProduct(Request $request, int $id, string $slug): Response
    {
//        $url = $this->generateUrl('store_product', [
//            'id' => $id,
//            'slug' => $slug
//        ]);
//        ou comme ca :
//        $url = $request->getPathInfo();
//
//        $host = 'http://symfony';
//        $url = $host . $url;
//        $ip = $request->getClientIp();

        return $this->render('store/store_show_product.html.twig', [
            'id' => $id,
            'slug' => $slug,
//            'controller_name' => 'Store_product',
//            'url' => $url,
//            'adresse_ip' => $ip
        ]);
    }
}