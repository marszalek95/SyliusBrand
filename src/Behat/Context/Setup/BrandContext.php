<?php 

namespace App\Behat\Context\Setup;

use App\Entity\Brand\BrandInterface;
use App\Repository\Brand\BrandRepositoryInterface;
use Behat\Behat\Context\Context;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Component\Product\Generator\SlugGeneratorInterface;
use Sylius\Resource\Factory\FactoryInterface;

class BrandContext implements Context
{
    /**
     * Initializes context.
     */
    public function __construct(
        private SharedStorageInterface $sharedStorage,
        private FactoryInterface $brandFactory,
        private BrandRepositoryInterface $brandRepository,
        private SlugGeneratorInterface $slugGenerator,
    )
    {
    }

    /**
     * @Given the store has brand :name
     */
    public function theStoreHasBrand(string $name): void
    {
        $brand = $this->createBrand($name);

        $this->saveBrand($brand);
    }

    private function createBrand(string $name): BrandInterface
    {
        /** @var BrandInterface $brand */
        $brand = $this->brandFactory->createNew();
        $brand->setName($name);
        $brand->setSlug($this->slugGenerator->generate($name));

        return $brand;        
    }

    private function saveBrand(BrandInterface $brand)
    {
        $this->brandRepository->add($brand);
        $this->sharedStorage->set('brand', $brand);
    }
}