<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use App\Form\Model\UserRegistrationFormModel;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            //->add('password')
            // don't use password: avoid EVER setting that on a
            // field that might be persisted
            ->add('plainPassword', RepeatedType::class, [
                //'mapped' => false,
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Choose a password!'
                    ]),
                    new Assert\Length([
                        'min' => 5,
                        'minMessage' => 'Come on, you can think of a password longer than that!'
                    ])
                ],
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),


            ])
            ->add('agreeTerms', CheckboxType::class, [
                //'mapped' => false,
                'constraints' => [
                    new Assert\IsTrue([
                        'message' => 'I know, it\'s silly, but you must agree to our terms.'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserRegistrationFormModel::class,
        ]);
    }
}
