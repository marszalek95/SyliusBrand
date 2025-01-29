<?php

namespace App\Entity\Product;

use Sylius\Component\Product\Model\ProductInterface;
use App\Entity\Brand\BrandInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ProductBrandInterface extends ResourceInterface
{
    public function getProduct(): ?ProductInterface;

    public function setProduct(?ProductInterface $product): self;

    public function getBrand(): ?BrandInterface;

    public function setBrand(?BrandInterface $brand): self;
}