<?php

namespace App\Controller;

use App\Services\Slugify;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'Liste des produits',
        ]);
    }

    #[Route('/product/{string}', name: 'app_slug_product')]
    public function slugify(Slugify $slugify, $string): Response
    {
        $slug = $slugify->genereateSlug($string);
        return $this->render('product/slug.html.twig', [
            'controller_name' => 'Slug du produit',
            'slug' => $slug
        ]);
    }

    #[Route('/product/{id}', name: 'app_product_show')]
    public function show($id): Response
    {
        return $this->render('product/details.html.twig', [
            'controller_name' => 'Détail du produit',
            'id' => $id
        ]);
    }
}
