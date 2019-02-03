<?php

namespace App\Controller\Ajax;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ajax")
 */
class AjaxIngredientsController extends Controller
{
    /**
     * @Route("/ingredients", name="ajax_ingredients_show_ingredients_by_pizza")
     */
    public function showIngredientsByPizza(Request $request)
    {
        return $this->render('partials/_add_ingredients_to_pizza.html.twig', [
            'pizza' => $this->get('pizza.service')->getPizzaById($request->request->get('pizzaId')),
            'ingredients' => $this->get('ingredient.service')->getAllIngredients()
        ]);
    }
}