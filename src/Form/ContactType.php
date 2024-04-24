<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                'label' => 'Nom *',
                'constraints' => [
                    new NotBlank(['message' => 'Merci de remplir le champ Nom']),
                    new Regex([
                        'pattern' => '/^[^0-9?!\/.*_]+$/',
                        'message' => 'Le nom ne peut pas contenir de chiffres ni les caractères spéciaux ?!/*._'
                    ]),
                ],
                'attr' => [
                    'class' => 'input input-width',
                    'placeholder' => 'Votre Nom',
                    'pattern' => '^[^0-9?!\/.*_]+$'
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'row_attr' => [
                    'class' => 'form-group'
                ],
            ])
            ->add('company', TextType::class, [
                'label' => 'Société',
                'attr' => [
                    'class' => 'input input-width',
                    'placeholder' => 'Entrez le nom de votre société',
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'required' => false,
            ])
            ->add('phone', NumberType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'class' => 'input input-width',
                    'placeholder' => 'Votre numéro de téléphone',
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'required' => false,
            ])
            ->add('Email', EmailType::class, [
                'label' => 'Email *',
                'constraints' => [
                    new NotBlank(['message' => 'Merci de remplir le champ Email'])
                ],
                'attr' => [
                    'class' => 'input input-width',
                    'placeholder' => 'Votre email',
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],

            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message *',
                'constraints' => [
                    new NotBlank(['message' => 'Merci de remplir le champ'])
                ],
                'attr' => [
                    'class' => 'input input-width',
                    'placeholder' => 'Votre message',
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
