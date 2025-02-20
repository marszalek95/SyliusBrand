<?php

namespace App\Twig\Components;

use App\Repository\Brand\BrandRepositoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use App\Entity\Brand\BrandInterface;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent]
final class BrandComponent
{
    public function __construct(
        protected RequestStack $requestStack,
        protected BrandRepositoryInterface $brandRepository,
    ) {
    }

    #[ExposeInTemplate('brand')]
    public function brand(): ?BrandInterface
    {
        $request = $this->requestStack->getCurrentRequest();
        $brandSlug = $request->attributes->get('brandSlug');

        if (null === $brandSlug) {
            throw new \InvalidArgumentException('Brand slug is required to render breadcrumb.');
        }

        return $this->brandRepository->findOneBySlug($brandSlug);
    }
}
