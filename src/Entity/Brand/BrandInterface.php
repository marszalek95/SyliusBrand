<?php

namespace App\Entity\Brand;

use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Resource\Model\ResourceInterface;

interface BrandInterface extends ResourceInterface
{
    public function getName(): ?string;

    public function setName(?string $name): static;

    public function getSlug(): ?string;

    public function setSlug(?string $slug): static;

    public function getImage(): ?ImageInterface;

    public function setImage(?ImageInterface $image): void;
}