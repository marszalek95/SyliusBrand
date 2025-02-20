<?php

namespace App\Repository\Brand;

use App\Entity\Brand\Brand;
use App\Entity\Brand\BrandInterface;
interface BrandRepositoryInterface
{
    public function findOneBySlug(string $slug): ?BrandInterface;
}
