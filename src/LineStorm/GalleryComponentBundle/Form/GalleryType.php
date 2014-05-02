<?php

namespace LineStorm\GalleryComponentBundle\Form;

use LineStorm\CmsBundle\Form\AbstractCmsFormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GalleryType extends AbstractCmsFormType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('images', 'dropzone', array(
                'type'      => 'linestorm_component_gallery_image',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => false,
                'prototype_name' => '__img_name__'
            ))
            ->add('body', 'textarea', array(
                'attr' => array(
                    'class' => 'ckeditor-textarea gallery-body',
                ),
                'label' => false,
                //'inline' => true,
            ))
            ->add('order', 'hidden')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->modelManager->getEntityClass('post_gallery')
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'linestorm_component_gallery';
    }
}
