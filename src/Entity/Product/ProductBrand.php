<?php

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Product\Model\ProductInterface;
use App\Repository\Product\ProductBrandRepository;
use App\Entity\Product\ProductBrandInterface;
use App\Entity\Brand\BrandInterface;
use Sylius\Resource\Model\ResourceInterface;

#[ORM\Entity(repositoryClass: ProductBrandRepository::class)]
#[ORM\Table(name: 'sylius_product_brand')]
class ProductBrand implements ProductBrandInterface, ResourceInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ProductInterface::class, inversedBy: "productBrands")]
    #[ORM\JoinColumn(nullable: true, onDelete: "CASCADE")]
    private ?ProductInterface $product = null;

    #[ORM\ManyToOne(targetEntity: BrandInterface::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: "CASCADE")]
    private ?BrandInterface $brand = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?ProductInterface
    {
        return $this->product;
    }

    public function setProduct(?ProductInterface $product): self
    {
        $this->product = $product;
        return $this;
    }

    public function getBrand(): ?BrandInterface
    {
        return $this->brand;
    }

    public function setBrand(?BrandInterface $brand): self
    {
        $this->brand = $brand;
        return $this;
    }
}
