<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;

class importCsvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('csv', FileType::class, [
                'label' => 'listeJeux (CSV file)',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                // 'constraints' => [
                //     new File([
                //         'mimeTypes' => [
                //             'text/csv'
                //         ],
                //         'mimeTypesMessage' => 'Please upload a valid csv document',
                //     ])
                // ],
            ])
            ->add('save', SubmitType::class)
            ;
    }
}