<?php

namespace App\Repository\Product;

use App\Entity\Product\ProductBrand;
use App\Entity\Product\ProductBrandInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\ResourceRepositoryTrait;
use Sylius\Resource\Doctrine\Persistence\RepositoryInterface;

class ProductBrandRepository extends ServiceEntityRepository implements RepositoryInterface, ProductBrandRepositoryInterface
{
    use ResourceRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductBrand::class);
    }
}
