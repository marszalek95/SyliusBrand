<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\Common\Collections\Collection;
use Sylius\Component\Product\Model\ProductInterface as BaseProductInterface;

interface ProductInterface extends BaseProductInterface
{
    public function getProductBrands(): Collection;

    public function addProductBrand(ProductBrandInterface $productBrand): void;

    public function removeProductBrand(ProductBrandInterface $productBrand): void;

    public function hasProductBrand(ProductBrandInterface $productBrand): bool;
}