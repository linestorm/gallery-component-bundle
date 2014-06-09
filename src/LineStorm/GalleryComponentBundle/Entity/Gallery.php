<?php

namespace LineStorm\GalleryComponentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LineStorm\GalleryComponentBundle\Model\Gallery as BaseGallery;

/**
 * Class Gallery
 *
 * @package LineStorm\GalleryComponentBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class Gallery extends BaseGallery
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
     * @var GalleryImage
     *
     * @ORM\OneToMany(targetEntity="GalleryImage", mappedBy="gallery", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinTable(name="gallery_image")
     * @ORM\OrderBy({"order" = "ASC", "id" = "ASC"})
     */
    protected $images;
} 
