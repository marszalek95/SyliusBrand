<?php

namespace App\Repository\Product;

use App\Entity\Brand\BrandInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository as BaseProductRepository;
use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Core\Model\TaxonInterface;

class ProductRepository extends BaseProductRepository
{
    public function createShopListQueryBuilder(
        ChannelInterface $channel,
        TaxonInterface $taxon = null,
        string $locale,
        array $sorting = [],
        bool $includeAllDescendants = false,
        BrandInterface $brand = null
    ): QueryBuilder {
        $queryBuilder = parent::createShopListQueryBuilder($channel, $taxon, $locale, $sorting, $includeAllDescendants);
        if (null !== $brand) {
            $queryBuilder
                ->innerJoin('o.productBrands', 'pb')
                ->innerJoin('pb.brand', 'b')
                ->andWhere('b = :brand')
                ->setParameter('brand', $brand);
        }
    
        return $queryBuilder;
    }
}