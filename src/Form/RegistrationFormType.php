<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Email
        $emailConstraint = new NotBlank();
        $emailConstraint->message = 'Please enter an email';

        // Password
        $passwordConstraintNotBlank = new NotBlank();
        $passwordConstraintNotBlank->message = 'Please enter a password';
        $passwordConstraintLength = new Length(4);
        $passwordConstraintLength->minMessage = 'Your password should be at least {{ limit }} characters';

        $builder
            ->add('email', EmailType::class, [
                'constraints' => [
                    $emailConstraint,
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false, // не записывать в User напрямую
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    $passwordConstraintNotBlank,
                    $passwordConstraintLength,
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
