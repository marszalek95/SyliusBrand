<?php

namespace App\Entity\Product;

use Sylius\Component\Product\Model\ProductInterface;
use App\Entity\Brand\Brand;


interface ProductBrandInterface
{
    public function getId(): ?int;

    public function getProduct(): ProductInterface;

    public function setProduct(ProductInterface $product): self;

    public function getBrand(): Brand;

    public function setBrand(Brand $brand): self;
}