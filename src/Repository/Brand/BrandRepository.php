<?php

namespace App\Repository\Brand;

use App\Entity\Brand\Brand;
use App\Entity\Brand\BrandInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\ResourceRepositoryTrait;
use Sylius\Resource\Doctrine\Persistence\RepositoryInterface;

class BrandRepository extends ServiceEntityRepository implements RepositoryInterface, BrandRepositoryInterface
{
    use ResourceRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Brand::class);
    }

    public function findOneBySlug(string $slug): ?BrandInterface
    {
        return $this->findOneBy(['slug' => $slug]);
    }
}