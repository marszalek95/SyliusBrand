<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Brand\Brand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Autocomplete\Form\AsEntityAutocompleteField;
use Symfony\UX\Autocomplete\Form\BaseEntityAutocompleteType;

#[AsEntityAutocompleteField(
    alias: 'sylius_admin_product_brand',
    route: 'sylius_admin_entity_autocomplete',
)]
final class ProductBrandAutocompleteType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'class' => Brand::class,
            'choice_label' => 'name',
            'choice_value' => 'id',
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'sylius_admin_product_brand_autocomplete';
    }

    public function getParent(): string
    {
        return BaseEntityAutocompleteType::class;
    }

    
}