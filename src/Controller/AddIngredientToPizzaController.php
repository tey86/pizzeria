<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/addingredienttopizza")
 */
class AddIngredientToPizzaController extends Controller
{
    /**
     * @Route("/", name="addingredientstopizza_index")
     */
    public function index()
    {
        return $this->render('addingredienttopizza/index.html.twig', [
            'pizzas' => $this->get('pizza.service')->getAllPizzas(),
        ]);
    }
}