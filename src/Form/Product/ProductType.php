<?php

namespace App\Form\Product;

use App\Entity\Product\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['class' => 'mb-3']
            ])
            ->add('info', TextareaType::class, [
                'attr' => ['class' => 'mb-3', 'rows' => '8']
            ])
            ->add('public_date', DateType::class, [
                'attr' => ['class' => 'col-md-3 mb-3'],
                'widget' => 'single_text',
            ])
            ->add('price', MoneyType::class, [
                'attr' => ['class' => 'col-md-3 mb-3'],
                'currency' => 'PLN'
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary mt-2'],
             ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id'   => 'product_item',
        ]);
    }
}
