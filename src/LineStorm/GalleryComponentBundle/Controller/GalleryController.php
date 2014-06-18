<?php

namespace LineStorm\GalleryComponentBundle\Controller;

use LineStorm\GalleryComponentBundle\Model\Gallery;
use LineStorm\GalleryComponentBundle\Model\GalleryImage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Frontend Gallery Controller
 *
 * Class GalleryController
 *
 * @package LineStorm\GalleryComponentBundle\Controller
 */
class GalleryController extends Controller
{

    public function displayAction($id, $image=1)
    {
        $module = $this->get('linestorm.cms.module.page');
        $modelManager = $this->get('linestorm.cms.model_manager');
        $gallery = $modelManager->get('post_gallery')->find($id);

        if(!($gallery instanceof Gallery))
        {
            throw $this->createNotFoundException("Gallery not found");
        }

        $galleryImage = $gallery->getImages()->get($image);

        if(!($galleryImage instanceof GalleryImage))
        {
            throw $this->createNotFoundException("Image not found");
        }

        return $this->render('LineStormGalleryComponentBundle:Gallery:display.html.twig', array(
            'gallery' => $gallery,
            'image'  => $galleryImage->getImage(),
            'module' => $module,
        ));
    }
}
