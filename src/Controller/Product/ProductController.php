<?php

namespace App\Controller\Product;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\Product\ProductRepository;
use App\Entity\Product\Product;
use App\Form\Product\ProductType;
use App\Form\Product\ProductFiltrType;


class ProductController extends AbstractController
{
    /**
     * @Route("/products", name="products-list")
     * @param Request $request
     * @param ProductRepository $productRepository
     * @param ValidatorInterface $validator
     * @return Response
     */
    public function index(Request $request, ProductRepository $productRepository, ValidatorInterface $validator): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductFiltrType::class);
        $form->handleRequest($request);
        $errors = $validator->validate($product);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            if (!empty($data['from']) && !empty($data['to'])) {
                $products = $productRepository->getByPriceBetween($data['from'], $data['to']);
                return $this->render('product/index.html.twig', [
                    'products' =>  !empty($products) ? $products : '',
                    'form' => $form->createView(),
                ]);
            }
            if (count($errors) > 0) {
                return $this->render('product/index.html.twig', [
                    'products' => !empty($products) ? $products : '',
                    'form' => $form->createView(),
                    'errors' => $errors,
                ]);
            }
        }

        $products = $productRepository->getAll();
        return $this->render('product/index.html.twig', [
            'products' =>  !empty($products) ? $products : '',
            'form' => $form->createView(),
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
     * @Route("/product/show/{id}", name="product-show", requirements={"id"="\d+"})
     * @param Request $request
     * @param ProductRepository $productRepository
     * @return Response
     */
    public function show(Request $request, ProductRepository $productRepository): Response
    {
        $id = $request->get('id');
        $product = $productRepository->getProductById($id);
        if ($request->isMethod('get')) {
            return $this->render('product/show.html.twig', [
                'product' => $product[0]
            ]);
        }
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
