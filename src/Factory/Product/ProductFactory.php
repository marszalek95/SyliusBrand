<?php

declare(strict_types=1);

namespace App\Factory\Product;

use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Product\Factory\ProductFactoryInterface;

final class ProductFactory implements ProductFactoryInterface
{
    /** @var ProductFactoryInterface  */
    private $decoratedFactory;

    public function __construct(ProductFactoryInterface $factory)
    {
        $this->decoratedFactory = $factory;
    }

    public function createNew(): ProductInterface
    {
        /** @var ProductInterface $product */
        $product = $this->decoratedFactory->createNew();

        $product->setEnabled(false);
        

        return $product;
    }

    public function createWithVariant(): ProductInterface
    {
        /** @var ProductInterface $product */
        $product = $this->decoratedFactory->createWithVariant();

        $product->setEnabled(false);
        

        return $product;
    }
}