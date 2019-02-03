<?php

namespace App\Service;

use App\Entity\Ingredient;
use App\Repository\IngredientRepository;
use Doctrine\ORM\EntityManager;

class IngredientService
{
    private $entityManager;

    /** @var IngredientRepository $ingredientRepository */
    private $ingredientRepository;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->ingredientRepository = $entityManager->getRepository(Ingredient::class);
    }

    public function getAllIngredients() : array
    {
        return $this->ingredientRepository->findAll();
    }

    public function getIngredientById(int $ingredientId)
    {
        return $this->ingredientRepository->find($ingredientId);
    }

}