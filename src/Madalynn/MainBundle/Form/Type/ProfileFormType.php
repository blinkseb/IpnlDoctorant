<?php

/*
 * This file is part of the IpnlDoctorant Bundle.
 *
 *  (c) Sébastien Brochet <blinkseb@madalynn.eu>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace Madalynn\MainBundle\Form\Type;

use Symfony\Component\Form\FormBuilder;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

/**
 * Description of ProfileFormType
 *
 * @author Sébastien Brochet
 */
class ProfileFormType extends BaseType
{
    public function getName()
    {
        return 'madalynn_user_profile';
    }

    /**
     * Builds the embedded form representing the user.
     *
     * @param FormBuilder $builder
     * @param array       $options
     */
    protected function buildUserForm(FormBuilder $builder, array $options)
    {
        parent::buildUserForm($builder, $options);
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('thesis')
            ->add('group')
            ->add('building')
            ->add('level')
            ->add('office')
            ->add('phone');
        $now = new \DateTime();
        $now = (int) $now->format('Y');
        $builder
            ->add('birthday', 'date', array(
                'years' => range($now - 100, $now)
            ));
    }
}

?>
