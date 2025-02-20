<?php

namespace App\Tests\Repository;

use App\Entity\Brand\BrandInterface;
use App\Repository\Product\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use PHPUnit\Framework\TestCase;
use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Core\Model\TaxonInterface;

class ProductRepositoryTest extends TestCase
{
    private $entityManager;
    private $productRepository;

    protected function setUp(): void
    {
        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->productRepository = new ProductRepository($this->entityManager);
    }

    public function testCreateShopListQueryBuilderWithoutBrand(): void
    {
        $channel = $this->createMock(ChannelInterface::class);
        $taxon = $this->createMock(TaxonInterface::class);
        $locale = 'en_US';
        $sorting = [];
        $includeAllDescendants = false;

        $queryBuilder = $this->createMock(QueryBuilder::class);
        $this->entityManager->method('createQueryBuilder')->willReturn($queryBuilder);

        $result = $this->productRepository->createShopListQueryBuilder($channel, $taxon, $locale, $sorting, $includeAllDescendants);

        $this->assertInstanceOf(QueryBuilder::class, $result);
    }

    public function testCreateShopListQueryBuilderWithBrand(): void
    {
        $channel = $this->createMock(ChannelInterface::class);
        $taxon = $this->createMock(TaxonInterface::class);
        $locale = 'en_US';
        $sorting = [];
        $includeAllDescendants = false;
        $brand = $this->createMock(BrandInterface::class);

        $queryBuilder = $this->createMock(QueryBuilder::class);
        $queryBuilder->expects($this->once())
            ->method('innerJoin')
            ->withConsecutive(
                ['o.productBrands', 'pb'],
                ['pb.brand', 'b']
            )
            ->willReturnSelf();
        $queryBuilder->expects($this->once())
            ->method('andWhere')
            ->with('b = :brand')
            ->willReturnSelf();
        $queryBuilder->expects($this->once())
            ->method('setParameter')
            ->with('brand', $brand)
            ->willReturnSelf();

        $this->entityManager->method('createQueryBuilder')->willReturn($queryBuilder);

        $result = $this->productRepository->createShopListQueryBuilder($channel, $taxon, $locale, $sorting, $includeAllDescendants, $brand);

        $this->assertInstanceOf(QueryBuilder::class, $result);
    }
}