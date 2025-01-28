<?php

namespace App\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use App\Form\Type\ProductBrandType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;


class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('productBrands', CollectionType::class, [
            'entry_type' => ProductBrandType::class,
            'required' => false,
            'prototype' => true,
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
            'label' => false,
            'entry_options' => [
                'label' => false,
            ],
        ]);

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $data = $event->getData();

            if (isset($data['productBrands'])) {
                foreach ($data['productBrands'] as $key => $productBrandData) {
                    if (empty($productBrandData['brand'])) {
                        unset($data['productBrands'][$key]);
                    }
                }
            }

            $event->setData($data);
        });
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
