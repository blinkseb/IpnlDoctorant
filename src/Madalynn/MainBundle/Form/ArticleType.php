<?php

namespace Madalynn\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('visible')
            ->add('title')
            ->add('content')
            ->add('slug')
            ->add('created')
            ->add('updated')
            ->add('author')
        ;
    }

    public function getName()
    {
        return 'madalynn_mainbundle_articletype';
    }
}
