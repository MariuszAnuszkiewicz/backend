<?php

namespace App\Controller\Product;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\Product\ProductRepository;
use App\Entity\Product\Product;
use App\Form\Product\ProductType;


class ProductController extends AbstractController
{
    /**
     * @Route("/products", name="products-list")
     * @param ProductRepository $productRepository
     * @return Response
     */
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->getAll();
        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/product/create", name="product-create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
            if ($form->isSubmitted()) {
                $submittedToken = $request->request->get('token');
                if ($this->isCsrfTokenValid('product-item', $submittedToken)) {
                    $product = $form->getData();
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($product);
                    $entityManager->flush();

                    $this->addFlash('success', 'Product was add successfully.');
                    return $this->redirectToRoute('products-list');
                }
            }

        return $this->render('product/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/product/edit/{id}", name="product-edit", requirements={"id"="\d+"})
     * @param Request $request
     * @return Response
     */
    public function editProduct(Request $request): Response
    {
        $id = $request->get('id');
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $submittedToken = $request->request->get('token');
            if ($this->isCsrfTokenValid('product-item', $submittedToken)) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
                return $this->redirectToRoute('products-list');
            }
        }

        return $this->render('product/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
