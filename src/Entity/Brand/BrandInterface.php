<?php

namespace App\Entity\Brand;

interface BrandInterface
{
    public function getId(): ?int;

    public function getName(): ?string;

    public function setName(string $name): self;

    public function getDescription(): ?string;

    public function setDescription(?string $description): self;
}