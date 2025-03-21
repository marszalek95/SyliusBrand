<?php

namespace App\Behat\Transform;

use Behat\Behat\Context\Context;
use App\Repository\Brand\BrandRepositoryInterface;

final class BrandContext implements Context
{
    public function __construct(
        private BrandRepositoryInterface $brandRepository
    ) {
    }

    /**
     * @Transform :brand
     */
    public function getBrandByName($brandName)
    {
        $brand = $this->brandRepository->findByName($brandName);

        if (null === $brand) {
            throw new \Exception(sprintf('Brand with name "%s" not found', $brandName));
        }
            
        return $brand;
    }
}