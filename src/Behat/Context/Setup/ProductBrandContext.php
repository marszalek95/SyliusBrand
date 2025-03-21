<?php 

namespace App\Behat\Context\Setup;

use App\Entity\Brand\BrandInterface;
use App\Entity\Product\ProductInterface;
use App\Repository\Product\ProductBrandRepositoryInterface;
use Behat\Behat\Context\Context;
use Sylius\Behat\Service\SharedStorageInterface;
use Sylius\Resource\Factory\FactoryInterface;
use App\Entity\Product\ProductBrandInterface;

class ProductBrandContext implements Context
{
    /**
     * Initializes context.
     */
    public function __construct(
        private SharedStorageInterface $sharedStorage,
        private FactoryInterface $productBrandFactory,
        private ProductBrandRepositoryInterface $productBrandRepository,
    )
    {
    }

    /**
     * @Given the :product product belongs to brand :brand
     */
    public function theProductBelongsToBrand(
        ProductInterface $product,
        BrandInterface $brand
    )
    {
        /** @var ProductBrandInterface $productBrand */
        $productBrand = $this->productBrandFactory->createNew();
        $productBrand->setProduct($product);
        $productBrand->setBrand($brand);

        $this->productBrandRepository->add($productBrand);
    }
}