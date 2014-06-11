<?php

namespace LineStorm\GalleryComponentBundle\Form;

use LineStorm\CmsBundle\Form\AbstractCmsFormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GalleryImageType extends AbstractCmsFormType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('body', 'textarea', array(
                'required' => false,
            ))
            ->add('image' , 'mediaentity', array(
                'required' => true,
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
            'label' => false,
            'data_class' => $this->modelManager->getEntityClass('post_gallery_image')
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'linestorm_component_gallery_image';
    }
}
