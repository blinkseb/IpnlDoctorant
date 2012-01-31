<?php

namespace Madalynn\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ArticleType extends AbstractType
{
    private $showauthor;
    public function __construct($showauthor = true)
    {
        $this->showauthor = $showauthor;
    }

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title', 'text', array(
                'attr' => array(
                    'class' => 'span9'
                )
            ))
            ->add('content', 'textarea', array(
                'required' => false,
                'attr' => array(
                    'rows' => 5,
                    'class' => 'span9 editor'
                )
            ));
        if ($this->showauthor) {
            $builder->add('author', null, array(
                'attr' => array(
                    'class' => 'span4'
                )
            ));
        }

        $builder->add('visible');
    }

    public function getName()
    {
        return 'madalynn_mainbundle_articletype';
    }
}
