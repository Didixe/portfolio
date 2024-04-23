<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                'label' => 'Nom *',
                'constraints' => [
                    new NotBlank(['message' => 'Merci de remplir le champ Nom'])
                ],
                'attr' => [
                    'class' => 'input input-width'
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
                    'class' => 'input input-width'
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('phone', TextType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'class' => 'input input-width'
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('Email', EmailType::class, [
                'label' => 'Email *',
                'constraints' => [
                    new NotBlank(['message' => 'Merci de remplir le champ Email'])
                ],
                'attr' => [
                    'class' => 'input input-width'
                ],
                'label_attr' => [
                    'class' => 'form-label',
                ],

            ])
            ->add('message', TextareaType::class, [
                'label' => 'message *',
                'constraints' => [
                    new NotBlank(['message' => 'Merci de remplir le champ'])
                ],
                'attr' => [
                    'class' => 'input input-width'
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
