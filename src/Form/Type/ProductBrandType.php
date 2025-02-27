<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Product\ProductBrand;

class ProductBrandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('brand', ProductBrandAutocompleteType::class, [
            'label' => 'Select brand',
        ]);        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductBrand::class,
            ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_admin_product_brands';
    }
}
