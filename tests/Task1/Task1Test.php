<?php

namespace Tests\Task1;

use App\Action\Product\GetAllProductsAction;
use App\Action\Product\GetCheapestProductsAction;
use App\Action\Product\GetMostPopularProductAction;
use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\ProductRepositoryInterface;
use Tests\TestCase;

class Task1Test extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->app->bind(ProductRepositoryInterface::class, function () {
            return new ProductRepository(self::getProducts());
        });
    }

    public function test_product_entity(): void
    {
        $product = new Product(
            1,
            'product',
            100.00,
            'url',
            4.5
        );

        $this->assertEquals(1, $product->getId());
        $this->assertEquals('product', $product->getName());
        $this->assertEquals(100.00, $product->getPrice());
        $this->assertEquals('url', $product->getImageUrl());
        $this->assertEquals(4.5, $product->getRating());
    }

    public function test_product_repository(): void
    {
        $repository = $this->app->make(ProductRepositoryInterface::class);
        $products = $repository->findAll();

        $this->assertNotEmpty($products);
        $this->assertProductsData($products);
    }

    public function test_get_all_products_action(): void
    {
        $action = $this->app->make(GetAllProductsAction::class);
        $response = $action->execute();

        $this->assertProductsData($response->getProducts());
    }

    public function test_get_cheapest_products_action(): void
    {
        $action = $this->app->make(GetCheapestProductsAction::class);
        $response = $action->execute();

        $this->assertCount(3, $response->getProducts());

        $cheapest = self::getCheapestProducts();

        foreach ($response->getProducts() as $index => $product) {
            $this->assertEquals($cheapest[$index]->getId(), $product->getId());
            $this->assertEquals($cheapest[$index]->getName(), $product->getName());
            $this->assertEquals($cheapest[$index]->getPrice(), $product->getPrice());
            $this->assertEquals($cheapest[$index]->getImageUrl(), $product->getImageUrl());
            $this->assertEquals($cheapest[$index]->getRating(), $product->getRating());
        }
    }

    public function test_get_most_popular_product_action(): void
    {
        $action = $this->app->make(GetMostPopularProductAction::class);
        $response = $action->execute();

        $product = $response->getProduct();

        $this->assertEquals(4, $product->getId());
        $this->assertEquals('product4', $product->getName());
        $this->assertEquals(400.44, $product->getPrice());
        $this->assertEquals('url4', $product->getImageUrl());
        $this->assertEquals(4.4, $product->getRating());
    }

    private function assertProductsData(array $products): void
    {
        foreach ($products as $product) {
            $this->assertInstanceOf(Product::class, $product);
            $this->assertNotEmpty($product->getId());
            $this->assertNotEmpty($product->getName());
            $this->assertNotEmpty($product->getPrice());
            $this->assertNotEmpty($product->getImageUrl());
            $this->assertNotEmpty($product->getRating());
        }
    }

    private static function getProducts(): array
    {
        return [
            new Product(
                2,
                'product2',
                200.22,
                'url2',
                2.2
            ),
            new Product(
                1,
                'product1',
                100.11,
                'url1',
                1.1
            ),
            new Product(
                3,
                'product3',
                300.33,
                'url3',
                3.3
            ),
            new Product(
                4,
                'product4',
                400.44,
                'url4',
                4.4
            )
        ];
    }

    private static function getCheapestProducts(): array
    {
        return [
            new Product(
                1,
                'product1',
                100.11,
                'url1',
                1.1
            ),
            new Product(
                2,
                'product2',
                200.22,
                'url2',
                2.2
            ),
            new Product(
                3,
                'product3',
                300.33,
                'url3',
                3.3
            )
        ];
    }
}
