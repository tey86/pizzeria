<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class MenuController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('menu/index.html.twig', [
            'pizzas' => $this->get('pizza.service')->getAllPizzas(),
        ]);
    }
}