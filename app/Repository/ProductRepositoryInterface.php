<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Product;

interface ProductRepositoryInterface
{
	/**
	 * @param Product[] $products
	 */
    public function __construct(array $products);

    /**
     * @return Product[]
     */
    public function findAll(): array;

    // TODO: Implement methods
}