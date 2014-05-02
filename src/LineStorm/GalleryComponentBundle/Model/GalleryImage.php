<?php

namespace LineStorm\GalleryComponentBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use LineStorm\MediaBundle\Model\Media;

class GalleryImage
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var integer
     */
    protected $order;

    /**
     * @var Gallery[]
     */
    protected $gallery;

    /**
     * @var Media
     */
    protected $image;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gallery
     *
     * @param Gallery $gallery
     * @return GalleryImage
     */
    public function setGallery(Gallery $gallery = null)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Get gallery
     *
     * @return Gallery
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param int $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param Media $image
     */
    public function setImage(Media $image)
    {
        $this->image = $image;
    }

    /**
     * @return Media
     */
    public function getImage()
    {
        return $this->image;
    }


    
    
}
