<?php

namespace App\Form;

use App\Entity\Feedback;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


class FeedbackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class, [
                'label' => 'Full Name',
                'constraints' => [
                    new NotBlank(['message' => 'Please enter your full name']),
                    new Regex([
                        'pattern' => '/^[A-Za-z]+$/',
                        'message' => 'Full name should contain only letters'
                    ])
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Address',
                'constraints' => [
                    new NotBlank(['message' => 'Please enter your address'])
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Phone Number',
                'constraints' => [
                    new NotBlank(['message' => 'Please enter your phone number']),
                    new Regex([
                        'pattern' => '/^\d{11}$/',
                        'message' => 'Phone number should contain 11 digits'
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email Address',
                'constraints' => [
                    new NotBlank(['message' => 'Please enter your email address']),
                    new Email(['message' => 'Please enter a valid email address'])
                ]
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Feedback::class,
        ]);
    }
}