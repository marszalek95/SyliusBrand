<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Sylius\Component\Product\Model\ProductTranslationInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_product')]
class Product extends BaseProduct implements ProductInterface
{
    #[ORM\OneToMany(mappedBy: "product", targetEntity: ProductBrand::class, cascade: ["remove", "persist"], orphanRemoval: true)]
    private Collection $productBrands;

    public function __construct()
    {
        parent::__construct();
        $this->productBrands = new ArrayCollection();
    }

    public function getProductBrands(): Collection
    {
        return $this->productBrands;
    }

    public function addProductBrand(ProductBrandInterface $productBrand): void
    {
        if (!$this->hasProductBrand($productBrand)) {
            $this->productBrands->add($productBrand);
            $productBrand->setProduct($this);
        }
    }

    public function removeProductBrand(ProductBrandInterface $productBrand): void
    {
        if ($this->hasProductBrand($productBrand)) {
            $this->productBrands->removeElement($productBrand);
        }
    }

    public function hasProductBrand(ProductBrandInterface $productBrand): bool
    {
        return $this->productBrands->contains($productBrand);
    }

    protected function createTranslation(): ProductTranslationInterface
    {
        return new ProductTranslation();
    }
}
