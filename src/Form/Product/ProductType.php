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
                'mapped' => true,
                'required' => false,
                'label_attr' => ['class' => 'mb-2'],
                'attr' => ['class' => 'mb-2'],
            ])
            ->add('info', TextareaType::class, [
                'mapped' => true,
                'required' => false,
                'label_attr' => ['class' => 'mb-2'],
                'attr' => ['class' => 'mb-2', 'rows' => '8']
            ])
            ->add('public_date', DateType::class, [
                'mapped' => true,
                'required' => false,
                'label_attr' => ['class' => 'mb-2'],
                'attr' => ['class' => 'col-md-3 mb-2'],
                'widget' => 'single_text',
            ])
            ->add('price', MoneyType::class, [
                'mapped' => true,
                'required' => false,
                'label_attr' => ['class' => 'mb-2'],
                'attr' => ['class' => 'col-md-3 mb-2'],
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
