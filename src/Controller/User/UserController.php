<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\User\UserRepository;
use App\Repository\Product\ProductRepository;
use App\Controller\User\Helpers\UserTrait;
use App\Entity\Product\Product;
use App\Entity\User\User;
use App\Form\User\UserType;
use App\Form\User\UserFiltrType;

class UserController extends AbstractController
{
    use UserTrait;

    /**
     * @var PaginatorInterface
     */
    private $paginator;

    public function __construct(PaginatorInterface $paginator) {
        $this->paginator = $paginator;
    }

    /**
     * @Route("/user/list/", name="users-list", methods={"GET","POST"})
     * @param Request $request
     * @param UserRepository $userRepository
     * @return Response
     */
    public function list(Request $request, UserRepository $userRepository): Response
    {
        $form = $this->createForm(UserFiltrType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $data = $form->getData();
            if (!empty($data['login']) || !empty($data['state'])) {
                $users = $userRepository->getByLoginOrStateLikePattern($data['login'], $data['state']);
                $users = $this->paginator->paginate($users, $request->query->getInt('page', 1), $userRepository::PER_PAGE);
                try {
                    if (count($users->getItems()) < 1) {
                        throw new \Exception('Selected User not find');
                    }
                } catch (\Exception $e) {
                    $this->addFlash('warning', $e->getMessage());
                }
                if (count($users->getItems()) > 0) {
                    return $this->render('user/index.html.twig', [
                        'users' => $users,
                        'form' => $form->createView(),
                    ]);
                }
            }
        }
        $users = $userRepository->getAll();
        $users = $this->paginator->paginate($users, $request->query->getInt('page', 1), $userRepository::PER_PAGE);
        return $this->render('user/index.html.twig', [
            'users' => !empty($users) ? $users : '',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/create", name="user-create")
     * @param Request $request
     * @param ValidatorInterface $validator
     * @return Response
     */
    public function create(Request $request, ValidatorInterface $validator): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $errors = $validator->validate($user);
        if ($form->isSubmitted() && $form->isValid()) {
            $submittedToken = $request->request->get('token');
            if ($this->isCsrfTokenValid('user_item', $submittedToken)) {
                $user = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                $this->addFlash('success', 'User was add successfully.');
                return $this->redirectToRoute('users-list');
            }
            if (count($errors) > 0) {
                return $this->render('user/create.html.twig', [
                    'form' => $form->createView(),
                    'errors' => $errors,
                ]);
            }
        }

        return $this->render('user/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/show/{id}", name="user-show", requirements={"id"="\d+"})
     * @param Request $request
     * @param UserRepository $userRepository
     * @return Response
     */
    public function show(Request $request, UserRepository $userRepository): Response
    {
        $id = $request->get('id');
        $user = $userRepository->getUserById($id);
        if ($request->isMethod('get')) {
            return $this->render('user/show.html.twig', [
                'user' => $user[0]
            ]);
        }
    }

    /**
     * @Route("/user/edit/{id}", name="user-edit", requirements={"id"="\d+"})
     * @param Request $request
     * @return Response
     */
    public function editUser(Request $request): Response
    {
        $id = $request->get('id');
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $submittedToken = $request->request->get('token');
            if ($this->isCsrfTokenValid('user_item', $submittedToken)) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();
                return $this->redirectToRoute('users-list');
            }
        }
        return $this->render('user/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/user/set-product", name="set-product")
     * @param Request $request
     * @param UserRepository $userRepository
     * @param ProductRepository $productRepository
     * @return Response
     */
    public function setProduct(Request $request, UserRepository $userRepository, ProductRepository $productRepository): Response
    {
        $users = $this->paginator->paginate($userRepository->getAll(), $request->query->getInt('page', 1), 8);
        $products = $productRepository->getAll();
        try {
            if (count($users->getItems()) < 1) {
                throw new \Exception('Any Users not exists');
            }
            if (!$products) {
                throw new \Exception('Any Products not exists');
            }
        } catch (\Exception $e) {
            $this->addFlash('warning', $e->getMessage());
        }

        if ($request->isMethod('post')) {
            $setUsers = $request->request->get('set_user');
            $setProducts = $request->request->get('set_product');
            if ($setUsers != null && $setProducts != null) {
                $this->addProductsForUser($setProducts, $setUsers);
            }
            try {
                if ($setUsers == null && $setProducts == null) {
                    throw new \Exception('You should choose users and products');
                }
            } catch (\Exception $e) {
                $this->addFlash('warning', $e->getMessage());
            }
        }

        return $this->render('user/like_product.html.twig', [
            'users' => $users,
            'products' => $products,
        ]);
    }

    /**
     * @Route("/user/liked-products", name="liked-products")
     * @param UserRepository $userRepository
     * @return Response
     */
    public function listLiked(UserRepository $userRepository): Response
    {
        foreach ($userRepository->getUsersProducts() as $userProduct) {
            $userIds[] = $userProduct['user_id'];
        }
        try {
            if (empty($userIds)) {
                throw new \Exception("There're haven't any products liked by user");
            }
        } catch (\Exception $e) {
            $this->addFlash('warning', $e->getMessage());
        }
        $usersById = $this->getDoctrine()->getManager()->getRepository(User::class)->findBy(['id' => $userIds], ['login' => 'ASC']);
        return $this->render('user/list_of_liked.html.twig', [
            'users' => $usersById
        ]);
    }
}
