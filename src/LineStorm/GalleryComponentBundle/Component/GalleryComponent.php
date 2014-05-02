<?php

namespace LineStorm\GalleryComponentBundle\Component;

use LineStorm\Content\Component\AbstractBodyComponent;
use LineStorm\Content\Component\ComponentInterface;
use LineStorm\PostBundle\Model\PostGallery;
use LineStorm\Content\Component\View\ComponentView;
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
    protected $name = 'Gallery';
    protected $id = 'galleries';

    /**
     * @inheritdoc
     */
    public function isSupported($entity)
    {
        return ($entity instanceof PostGallery);
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
        return new ComponentView('LineStormGalleryComponent::view.html.twig');
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
}
