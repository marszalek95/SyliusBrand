<?php

namespace App\Entity\Brand;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\Brand\BrandRepository;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Model\ImageAwareInterface;
use App\Entity\Brand\BrandImageInterface;

#[ORM\Entity(repositoryClass: BrandRepository::class)]
#[ORM\Table(name: 'sylius_brand')]
#[ApiResource]
class Brand implements ResourceInterface, ImageAwareInterface, BrandInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Assert\NotBlank]
    private ?string $slug = null;

    #[ORM\OneToOne(mappedBy: 'owner', targetEntity: BrandImageInterface::class, cascade: ['all'], orphanRemoval: true)]
    protected ?BrandImageInterface $image = null;

    public function __toString(): string
    {
        return (string) $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    /**@return BrandImage|null */
    public function getImage(): ?ImageInterface
    {
        return $this->image;
    }

    /**@var BrandImage|null $image */
    public function setImage(?ImageInterface $image): void
    {
        $image?->setOwner($this);
        $this->image = $image;
    }
}
