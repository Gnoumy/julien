<?php

namespace blogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhotosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position')
            ->add('nom')
            ->add('contributeur')
            ->add('description')
            /*->add('categorie')*/
            ->add('categorie', 'entity', array('class' => 'blogBundle\Entity\Categories', 'property' => 'nom'))
            ->add('file', 'file')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'blogBundle\Entity\Photos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'blogbundle_photos';
    }
}
