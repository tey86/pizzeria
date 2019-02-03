<?php

namespace App\Service;

use App\Entity\Ingredient;
use App\Entity\Pizza;
use App\Repository\PizzaRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;

class PizzaService
{
    private $entityManager;

    /** @var PizzaRepository $pizzaRepository */
    private $pizzaRepository;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->pizzaRepository = $entityManager->getRepository(Pizza::class);
    }

    public function getAllPizzas() : array
    {
        return $this->pizzaRepository->findAll();
    }

    public function getPizzaById(int $pizzaId)
    {
        return $this->pizzaRepository->find($pizzaId);
    }

    public function addIngredientToPizza(Ingredient $ingredient, Pizza $pizza) : bool
    {
        try {
            $pizza->addIngredient($ingredient);
            $pizza->setPrice($this->recalculatePizzaPriceByPizza($pizza));

            $this->entityManager->persist($pizza);
            $this->entityManager->flush();
            return true;
        } catch (ORMException $exception) {
            return false;
        }
    }

    public function removeIngredientToPizza(Ingredient $ingredient, Pizza $pizza) : bool
    {
        try {
            $pizza->removeIngredient($ingredient);
            $pizza->setPrice($this->recalculatePizzaPriceByPizza($pizza));

            $this->entityManager->persist($pizza);
            $this->entityManager->flush();
            return true;
        } catch (ORMException $exception) {
            return false;
        }
    }

    public function recalculatePizzaPriceByPizza(Pizza $pizza) : float
    {
        $price = 0;
        /** @var Ingredient $ingredient */
        foreach ($pizza->getIngredients() as $ingredient) {
            $price += $ingredient->getPrice();
        }

        return ($price + ($price / 2));
    }
}