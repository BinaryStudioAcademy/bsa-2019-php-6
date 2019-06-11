<?php

declare(strict_types=1);

namespace Tests\Task1;

use App\Repository\ProductRepositoryInterface;

class InMemoryProductRepository implements ProductRepositoryInterface
{
	private $products;

	public function __construct(array $products)
	{
		$this->products = $products;
	}

	public function findAll(): array
	{
		return $this->products;
	}
}