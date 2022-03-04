<?php

namespace App\Form;

use App\Entity\Offers;
use App\Entity\BenefitType;
use App\Entity\TypeOfDelivery;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class OfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Creator', TextType::class)
            ->add('modifier', TextType::class)
            ->add('amount', MoneyType::class, array(
                'scale' => 2,
                'currency' => false,
            ))
            ->add('limitDate', DateType::class)
            ->add('delivery')
            ->add('offers_delivery', EntityType::class, array(
                'class' => TypeOfDelivery::class,
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => false
            ))
            ->add('offer_benefit', EntityType::class, array(
                'class' => BenefitType::class,
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => false
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offers::class,
        ]);
    }
}
