<?php

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Product\Model\ProductInterface;
use App\Entity\Brand\Brand;
use App\Repository\Product\ProductBrandRepository;
use App\Entity\Product\ProductBrandInterface;

#[ORM\Entity(repositoryClass: ProductBrandRepository::class)]
#[ORM\Table(name: 'sylius_product_brand')]
class ProductBrand implements ProductBrandInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ProductInterface::class, inversedBy: "productBrands")]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private ProductInterface $product;

    #[ORM\ManyToOne(targetEntity: Brand::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Brand $brand;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ProductInterface
    {
        return $this->product;
    }

    public function setProduct(ProductInterface $product): self
    {
        $this->product = $product;
        return $this;
    }

    public function getBrand(): Brand
    {
        return $this->brand;
    }

    public function setBrand(Brand $brand): self
    {
        $this->brand = $brand;
        return $this;
    }
}
