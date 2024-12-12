<?php

declare(strict_types=1);

namespace App\Entity\Brand;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Image;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_brand_image')]
class BrandImage extends Image
{
    #[ORM\OneToOne(inversedBy: 'image', targetEntity: Brand::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    protected $owner;

    public function __construct()
    {
        $this->type = 'default';
    }

    public function getBrand(): ?Brand
    {
        return $this->getOwner();
    }

    public function setBrand(?Brand $brand): void
    {
        $this->setOwner($brand);
    }
}