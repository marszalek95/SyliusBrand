<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Brand\BrandImage;
use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\FormBuilderInterface;

final class BrandImageType extends ImageType
{
    public function __construct()
    {
        parent::__construct(BrandImage::class, ['sylius']);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder->remove('type');
    }

    public function getBlockPrefix(): string
    {
        return 'brand_image';
    }
}