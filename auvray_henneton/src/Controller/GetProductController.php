<?php
declare (strict_types = 1);

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Product;
use App\Form\ArticleFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class GetProductController extends AbstractController
{
    public function __invoke(Request $request,EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Product::class);
        $prostId = $request->get('id');
        $post = $repository->find($prostId);
        $posts = $repository->findAll();

        return $this->render(
            'getPost.html.twig', 
            ['post' => $post,
            'numberOfPosts' => count($posts)]
        );
    }
}

?>