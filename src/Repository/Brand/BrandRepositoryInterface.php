<?php

namespace App\Repository\Brand;

use App\Entity\Brand\BrandInterface;
use Sylius\Resource\Doctrine\Persistence\RepositoryInterface;

interface BrandRepositoryInterface extends RepositoryInterface
{
    public function findOneBySlug(string $slug): ?BrandInterface;

    public function findByName(string $name): ?BrandInterface;
}
