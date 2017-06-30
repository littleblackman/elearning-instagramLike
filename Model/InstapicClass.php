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
     * hydrate function to setter all attributes
     *
     * @param $values
     * @return $this
     */
    public function hydrate($values)
    {

        foreach($values as $key => $value)
        {

            // couper la string avec les underscores
            $elements = explode('_', $key);
            $new_key = '';
            // concatener tous les elements en majuscule
            foreach ($elements as $el)
            {
                $new_key .= ucfirst($el);
            }

            // création de la méthode
            $method = "set".$new_key;

            // appel de la méthode si elle est appelable en variable
            if (is_callable(array($this, $method))) {
                $this->$method($value);
            }

        }

        return $this;
    }


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
     * return a short version of description
     * have a default lenghth value
     *
     * @param int $length
     * @return bool|string
     */
    public function getShortDescription($length = 100)
    {
        return substr($this->getDescription(), 0, $length);
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
     * @param timestamp
     * @return $this
     */
    public function setCreatedAt($date)
    {
        if(is_int($date))
        {
            $value = $date;
        } else {
            $value = null;
        }
        $this->created_at = $value;
        return $this;
    }

    /**
     * return the date of created
     *
     * @return string
     */
    public function getCreatedAt()
    {
        if(!$this->created_at) return null;
        $date = date('d/m/Y', $this->created_at);
        return $date;
    }

}