<?php

namespace App\Controller\Ajax;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ajax")
 */
class AjaxPizzaController extends Controller
{
    /**
     * @Route("/pizza", name="ajax_pizza_add_ingredient_to_pizza")
     */
    public function addIngredientToPizza(Request $request)
    {
        $pizza = $this->get('pizza.service')->getPizzaById($request->request->get('pizzaId'));
        $ingredient = $this->get('ingredient.service')->getIngredientById($request->request->get('ingredientId'));

        if ($pizza && $ingredient) {
            return new JsonResponse($this->get('pizza.service')->addIngredientToPizza($ingredient, $pizza));
        }

        return new JsonResponse(false);
    }
}