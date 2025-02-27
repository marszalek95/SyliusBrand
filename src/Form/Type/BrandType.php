<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BrandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
            ])
            ->add('slug', TextType::class, [
                'required' => true,
            ])
            ->add('image', BrandImageType::class, [
                'label' => false,
                'required' => true,
            ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_admin_brand';
    }
}
