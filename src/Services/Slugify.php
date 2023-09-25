<?php

namespace App\Services;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\AsciiSlugger;

class Slugify extends AbstractController
{
    public function genereateSlug($string)
    {
        $slugger = new AsciiSlugger();
        $string = $slugger->slug($string)->lower();
        return $string;
    }
}
