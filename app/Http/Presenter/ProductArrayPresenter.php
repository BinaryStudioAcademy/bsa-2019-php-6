<?php

declare(strict_types=1);

namespace App\Http\Presenter;

use App\Entity\Product;

class ProductArrayPresenter
{
    /**
     * @param Product[] $products
     * @return array
     */
    public static function presentCollection(array $products): array
    {
        // TODO: Implement
    }

    public static function present(Product $product): array
    {
        // TODO: Implement
    }
}
