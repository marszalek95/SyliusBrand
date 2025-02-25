<?php

namespace App\Repository\Product;

use App\Entity\Brand\BrandInterface;
use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository as BaseProductRepository;
use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Core\Model\ProductInterface;
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

    public function createListQueryBuilder(string $locale, $taxon_id = null): QueryBuilder
    {
        $queryBuilder = parent::createListQueryBuilder($locale);
        
        $queryBuilder
            ->leftJoin('o.productBrands', 'pb')
        ;
        
        return $queryBuilder;
    }

    public function findOneByChannelAndSlug(ChannelInterface $channel, string $locale, string $slug): ?ProductInterface
    {
        $product = $this->createQueryBuilder('o')
            ->addSelect('translation')
            ->innerJoin('o.translations', 'translation', 'WITH', 'translation.locale = :locale')
            ->leftjoin('o.productBrands', 'pb')
            ->andWhere('translation.slug = :slug')
            ->andWhere(':channel MEMBER OF o.channels')
            ->andWhere('o.enabled = :enabled')
            ->setParameter('channel', $channel)
            ->setParameter('locale', $locale)
            ->setParameter('slug', $slug)
            ->setParameter('enabled', true)
            ->getQuery()
            ->getOneOrNullResult()
        ;

        $this->associationHydrator->hydrateAssociations($product, [
            'images',
            'options',
            'options.translations',
            'variants',
            'variants.channelPricings',
            'variants.optionValues',
            'variants.optionValues.translations',
            'productBrands',
        ]);

        return $product;
    }
}