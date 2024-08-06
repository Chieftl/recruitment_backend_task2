<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class TimezoneFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', TextType::class, [
                'label' => 'Date: ',
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('timezone', TextType::class, [
                'label' => 'Timezone: ',
                'constraints' => [
                    new NotBlank(),
                ],
            ]);
    }
}