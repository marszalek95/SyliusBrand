<?php

namespace App\Form\Type;

use App\Entity\Brand\Brand;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Product\ProductBrand;

class ProductBrandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', EntityType::class, [
                'class' => Brand::class,
                'choice_label' => 'name',
                'label' => 'Select Brand',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductBrand::class, // Ensure this is set correctly
            'show_legend' => false,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'sylius_admin_product_brands';
    }
}
