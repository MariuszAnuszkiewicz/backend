<?php

namespace App\Form\User;

use App\Entity\User\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', TextType::class, [
                'mapped' => true,
                'required' => false,
                'label_attr' => ['class' => 'mb-2'],
                'attr' => ['class' => 'mb-2'],
            ])
            ->add('state',TextType::class, [
                'mapped' => true,
                'required' => false,
                'label_attr' => ['class' => 'mb-2'],
                'attr' => ['class' => 'mb-2'],
             ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary mt-2'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id'   => 'user_item',
        ]);
    }
}
