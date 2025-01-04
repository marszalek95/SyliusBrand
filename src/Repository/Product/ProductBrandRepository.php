<?php

namespace App\Repository\Product;

use App\Entity\Product\ProductBrand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * @extends ServiceEntityRepository<ProductBrand>
 */
class ProductBrandRepository extends EntityRepository
{
    
}
