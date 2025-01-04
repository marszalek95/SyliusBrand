<?php

namespace App\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\Type\ProductBrandType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;

class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('productBrands', CollectionType::class, [
                'entry_type' => ProductBrandType::class,
                'allow_add' => true,
                'by_reference' => false,
                'label' => false,
            ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
