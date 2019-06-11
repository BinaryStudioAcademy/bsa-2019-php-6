<?php

namespace Tests\Task2;

use App\Entity\Product;
use App\Http\Presenter\ProductArrayPresenter;
use Tests\TestCase;

class Task2Test extends TestCase
{
	public function test_product_presenter()
	{
		$product = new Product(
			1,
			'product',
			100.00,
			'url',
			4.5
		);

		$data = ProductArrayPresenter::present($product);

		$this->assertArrayHasKey('id', $data);
		$this->assertArrayHasKey('name', $data);
		$this->assertArrayHasKey('price', $data);
		$this->assertArrayHasKey('img', $data);
		$this->assertArrayHasKey('rating', $data);

		$this->assertEquals(1, $data['id']);
		$this->assertEquals('product', $data['name']);
		$this->assertEquals(100.00, $data['price']);
		$this->assertEquals('url', $data['img']);
		$this->assertEquals(4.5, $data['rating']);
	}

	public function test_get_all_products()
	{
		$data = $this->json('get', 'api/products')
			->assertHeader('Content-Type', 'application/json')
			->assertStatus(200)
			->assertJsonStructure([
				'*' => [
					'id',
					'name',
					'price',
					'img',
					'rating'
				]
			])
			->json();

		$this->assertNotEmpty($data);

		foreach ($data as $item) {
			$this->assertArrayHasKey('id', $item);
			$this->assertArrayHasKey('name', $item);
			$this->assertArrayHasKey('img', $item);
			$this->assertArrayHasKey('price', $item);
			$this->assertArrayHasKey('rating', $item);
		}
	}

	public function test_get_most_popular_product()
	{
		$this->json('get', 'api/products/popular')
			->assertHeader('Content-Type', 'application/json')
			->assertStatus(200)
			->assertJsonStructure([
				'id',
				'name',
				'price',
				'img',
				'rating'
			]);
	}
}