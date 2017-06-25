<?php

/**
 * Class Instapic
 * Class names MUST be declared in StudlyCaps.
 *
 */
class Instapic
{
    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $url;

    /**
     * @var date
     */
    private $created_at;


    /**
     * set the author
     * @param $author
     * @return $this
     */
    public function setAuthor($author)
    {
       $this->author = $author;
       return $this;
    }

    /**
     * return the name of the author
     * Method names MUST be declared in camelCase
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * set the description value
     *
     * @param $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * return the description of the instapc
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * set the url value
     *
     * @param $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * return the url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * set the created_at value
     *
     * @param $date
     * @return $this
     */
    public function setCreatedAt($date)
    {
        $this->created_at = $date;
        return $this;
    }

    /**
     * return the date of created
     *
     * @return date
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }


}