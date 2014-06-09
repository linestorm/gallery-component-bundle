<?php

namespace LineStorm\GalleryComponentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LineStorm\GalleryComponentBundle\Model\GalleryImage as BaseGalleryImage;
use LineStorm\MediaBundle\Model\Media;

/**
 * Class GalleryImage
 *
 * @package LineStorm\GalleryComponentBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class GalleryImage extends BaseGalleryImage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var Gallery[]
     *
     * @ORM\ManyToOne(targetEntity="Gallery", inversedBy="images", cascade={"remove"})
     */
    protected $gallery;

    /**
     * @var Media
     *
     * @ORM\ManyToOne(targetEntity="Media", cascade={"persist"})
     */
    protected $image;
} 
