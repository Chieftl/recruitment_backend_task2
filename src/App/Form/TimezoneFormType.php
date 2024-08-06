<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

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
                'attr' => [
                    'placeholder' => 'Y-m-d',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Regex([
                        'pattern' => '/^\d{4}-(0[1-9]|1[012])-(0[1-9]|[12]\d|3[01])$/',
                        'htmlPattern' => '/^\d{4}-(0[1-9]|1[012])-(0[1-9]|[12]\d|3[01])$/',
                        'message' => 'Please enter a valid date in the format Y-m-d.',
                    ]),
                ],
            ])
            ->add('timezone', TextType::class, [
                'label' => 'Timezone: ',
                'attr' => [
                    'placeholder' => 'e.g. Europe/London, Asia/Tokyo, America/Lower_Princes',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Regex([
                        'pattern' => '/^[a-zA-Z_-]{5,}\/[a-zA-Z_-]{5,}$/',
                        'htmlPattern' => '/^[a-zA-Z_-]{6,}\/[a-zA-Z_-]{3,}$/',
                        'message' => 'Please enter a valid timezone in the format Continent/City.',
                    ]),
                ],
            ]);
    }
}