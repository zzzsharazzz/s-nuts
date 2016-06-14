<?php
namespace Application\Model;

class News
{
    private $newsId;
    private $newsContent;
    private $newsImage;
    private $newsTitle;
    private $createdDate;

    /**
     * @return mixed
     */
    public function getNewsId()
    {
        return $this->newsId;
    }

    /**
     * @param mixed $newsId
     */
    public function setNewsId($newsId)
    {
        $this->newsId = $newsId;
    }

    /**
     * @return mixed
     */
    public function getNewsContent()
    {
        return $this->newsContent;
    }

    /**
     * @param mixed $newsContent
     */
    public function setNewsContent($newsContent)
    {
        $this->newsContent = $newsContent;
    }

    /**
     * @return mixed
     */
    public function getNewsImage()
    {
        return $this->newsImage;
    }

    /**
     * @param mixed $newsImage
     */
    public function setNewsImage($newsImage)
    {
        $this->newsImage = $newsImage;
    }

    /**
     * @return mixed
     */
    public function getNewsTitle()
    {
        return $this->newsTitle;
    }

    /**
     * @param mixed $newsTitle
     */
    public function setNewsTitle($newsTitle)
    {
        $this->newsTitle = $newsTitle;
    }

    /**
     * @return mixed
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param mixed $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    public function exchangeArray($data) {
        return null;
    }
    
}