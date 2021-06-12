<?php

namespace App\Form\User;

use App\Entity\User\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    const ALABAMA = 'Alabama';
    const ALASKA = 'Alaska';
    const ARIZONA = 'Arizona';
    const ARKANSAS = 'Arkansas';
    const CALIFORNIA = 'California';
    const COLORADO = 'Colorado';
    const CONNECTICUT = 'Connecticut';
    const DELAWARE = 'Delaware';
    const FLORIDA = 'Florida';
    const GEORGIA = 'Georgia';
    const HAWAII = 'Hawaii';
    const IDAHO = 'Idaho';
    const ILLINOIS = 'Illinois';
    const INDIANA = 'Indiana';
    const IOWA = 'Iowa';
    const KANSAS = 'Kansas';
    const KENTUCKY = 'Kentucky';
    const LOUISIANA = 'Louisiana';
    const MAINE = 'Maine';
    const MARYLAND = 'Maryland';
    const MASSACHUSETTS = 'Massachusetts';
    const MICHIGAN = 'Michigan';
    const MINNESOTA = 'Minnesota';
    const MISSISSIPPI = 'Mississippi';
    const MISSOURI = 'Missouri';
    const MONTANA = 'Montana';
    const NEBRASKA = 'Nebraska';
    const NEVADA = 'Nevada';
    const NEW_HAMPSHIRE = 'New Hampshire';
    const NEW_YERSEY = 'New Yersey';
    const NEW_MEXICO = 'New Mexico';
    const NEW_YORK = 'New York';
    const NORTH_CAROLINA = 'North Carolina';
    const NORTH_DAKOTA = 'North Dakota';
    const OHIO = 'Ohio';
    const OKLAHOMA = 'Oklahoma';
    const OREGON = 'Oregon';
    const PENNSYLVANIA = 'Pennsylvania';
    const RHODE_ISLAND = 'Rhode Island';
    const SOUTH_CAROLINA = 'South Carolina';
    const SOUTH_DAKOTA = 'South Dakota';
    const TENNESSEE = 'Tennessee';
    const TEXAS = 'Texas';
    const UTAH = 'Utah';
    const VERMONT = 'Vermont';
    const VIRGINIA = 'Virginia';
    const WASHINGTON = 'Washington';
    const WEST_VIRGINIA = 'West Virginia';
    const WISCONSIN = 'Wisconsin';
    const WYOMING = 'Wyoming';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('login', TextType::class, [
                'mapped' => true,
                'required' => false,
                'label_attr' => ['class' => 'mb-2'],
                'attr' => ['class' => 'mb-2'],
            ])
            ->add('state', ChoiceType::class, [
                'mapped' => true,
                'required' => false,
                'choices' => [
                    'Choice State' => [
                        self::ALABAMA => self::ALABAMA,
                        self::ALASKA => self::ALASKA,
                        self::ARIZONA => self::ARIZONA,
                        self::ARKANSAS => self::ARKANSAS,
                        self::CALIFORNIA => self::CALIFORNIA,
                        self::COLORADO => self::COLORADO,
                        self::CONNECTICUT => self::CONNECTICUT,
                        self::DELAWARE => self::DELAWARE,
                        self::FLORIDA => self::FLORIDA,
                        self::GEORGIA => self::GEORGIA,
                        self::HAWAII => self::HAWAII,
                        self::IDAHO => self::IDAHO,
                        self::ILLINOIS => self::ILLINOIS,
                        self::INDIANA => self::INDIANA,
                        self::IOWA => self::IOWA,
                        self::KANSAS => self::KANSAS,
                        self::KENTUCKY => self::KENTUCKY,
                        self::LOUISIANA => self::LOUISIANA,
                        self::MAINE => self::MAINE,
                        self::MARYLAND => self::MARYLAND,
                        self::MASSACHUSETTS => self::MASSACHUSETTS,
                        self::MICHIGAN => self::MICHIGAN,
                        self::MINNESOTA => self::MINNESOTA,
                        self::MISSISSIPPI => self::MISSISSIPPI,
                        self::MISSOURI => self::MISSOURI,
                        self::MONTANA => self::MONTANA,
                        self::NEBRASKA => self::NEBRASKA,
                        self::NEVADA => self::NEVADA,
                        self::NEW_HAMPSHIRE => self::NEW_HAMPSHIRE,
                        self::NEW_YERSEY => self::NEW_YERSEY,
                        self::NEW_MEXICO => self::NEW_MEXICO,
                        self::NEW_YORK => self::NEW_YORK,
                        self::NORTH_CAROLINA => self::NORTH_CAROLINA,
                        self::NORTH_DAKOTA => self::NORTH_DAKOTA,
                        self::OHIO => self::OHIO,
                        self::OKLAHOMA => self::OKLAHOMA,
                        self::OREGON => self::OREGON,
                        self::PENNSYLVANIA => self::PENNSYLVANIA,
                        self::RHODE_ISLAND => self::RHODE_ISLAND,
                        self::SOUTH_CAROLINA => self::SOUTH_CAROLINA,
                        self::SOUTH_DAKOTA => self::SOUTH_DAKOTA,
                        self::TENNESSEE => self::TENNESSEE,
                        self::TEXAS => self::TEXAS,
                        self::UTAH => self::UTAH,
                        self::VERMONT => self::VERMONT,
                        self::VIRGINIA => self::VIRGINIA,
                        self::WASHINGTON => self::WASHINGTON,
                        self::WEST_VIRGINIA => self::WEST_VIRGINIA,
                        self::WISCONSIN => self::WISCONSIN,
                        self::WYOMING => self::WYOMING,
                    ],
                ],
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
