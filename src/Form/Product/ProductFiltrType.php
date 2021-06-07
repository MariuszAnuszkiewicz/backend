<?php

namespace App\Form\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Repository\Product\ProductRepository;

class ProductFiltrType extends AbstractType
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('GET')
            ->add('from', IntegerType::class, [
                'required' => false,
                'label_attr' => ['class' => 'mb-1'],
                'attr' => [
                    'min' => 1,
                    'class' => 'mt-2 mb-2',
                ]
            ])
            ->add('to', IntegerType::class, [
                'required' => false,
                'label_attr' => ['class' => 'mb-1'],
                'attr' => [
                    'min' => 1,
                    'class' => 'mt-2'
                ]
            ])
            ->add('filter', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary mt-3'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id'   => 'product_item',
        ]);
    }
}
