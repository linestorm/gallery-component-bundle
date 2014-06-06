<?php

namespace LineStorm\GalleryComponentBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use LineStorm\Content\Model\ContentNodeInterface;

class Gallery
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $order;

    /**
     * @var GalleryImage[]
     */
    protected $images;

    /**
     * @var ContentNodeInterface
     */
    protected $contentNode;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

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
     * Add images
     *
     * @param GalleryImage $images
     * @return Gallery
     */
    public function addImage(GalleryImage $images)
    {
        $this->images[] = $images;
        $images->setGallery($this);

        return $this;
    }

    /**
     * Remove images
     *
     * @param GalleryImage $images
     */
    public function removeImage(GalleryImage $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return Collection
     */
    public function getImages()
    {
        return $this->images;
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
     * @param ContentNodeInterface $contentNode
     */
    public function setContentNode(ContentNodeInterface $contentNode)
    {
        $this->contentNode = $contentNode;
    }

    /**
     * @return ContentNodeInterface
     */
    public function getContentNode()
    {
        return $this->contentNode;
    }



}
