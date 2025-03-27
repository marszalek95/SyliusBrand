<?php

namespace App\Entity\Brand;

use Sylius\Component\Core\Model\ImageInterface;

interface BrandImageInterface extends ImageInterface
{
    public function getBrand(): ?Brand;

    public function setBrand(?Brand $brand): void;
}