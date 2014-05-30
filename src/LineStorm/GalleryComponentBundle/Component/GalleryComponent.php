<?php

namespace LineStorm\GalleryComponentBundle\Component;

use LineStorm\Content\Component\AbstractBodyComponent;
use LineStorm\Content\Component\ComponentInterface;
use LineStorm\Content\Component\View\ComponentView;
use LineStorm\GalleryComponentBundle\Model\Gallery;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Provides image gallery component
 *
 * Class GalleryComponent
 *
 * @package LineStorm\GalleryComponentBundle\Component
 */
class GalleryComponent extends AbstractBodyComponent implements ComponentInterface
{
    /**
     * Fetch the component id string
     *
     * @return string
     */
    public function getId()
    {
        return 'galleries';
    }

    /**
     * Fetch the component name
     *
     * @return mixed
     */
    public function getName()
    {
        return  'Gallery';
    }

    /**
     * @inheritdoc
     */
    public function isSupported($entity)
    {
        return ($entity instanceof Gallery);
    }

    /**
     * @inheritdoc
     */
    public function getAssets()
    {
        return array(
            '@LineStormGalleryComponentBundle/Resources/public/js/gallery.js'
        );
    }

    /**
     * @inheritdoc
     */
    public function getView($entity)
    {
        return new ComponentView('LineStormGalleryComponentBundle::view.html.twig');
    }

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('galleries', 'collection', array(
                'type'      => 'linestorm_component_gallery',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label'     => false,
            ))
        ;
    }

    /**
     * @inheritdoc
     */
    public function getFormFields()
    {
        // forms are loaded asyncronously, so just return nothing
        return array();
    }
}
