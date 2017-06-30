<?php

include_once('InstapicClass.php');

/**
 * use only to create some InstaPic Object
 * as a big factory (or a manager)
 *
 * Class Manager
 */
class Manager
{
    /**
     * identification string of a compte
     *
     * @var string
     */
    private $instaCompte = "littlebl6ckm6n";


    /**
     * the url ton connect to XML API flicker
     *
     * @var string $url
     */
    private $flickerUrl = "https://api.flickr.com/services/feeds/photos_public.gne";

    /**
     * test picture
     *
     * @return array
     */
    public function createTestPics()
    {
        
        $pic1 = new Instapic();
        $pic1->setAuthor("eyesofchildrenaroundtheworld");
        $pic1->setDescription('Photo by @miweb_photography');
        $pic1->setUrl("insta1.jpg");
        $pic1->setCreatedAt("17/06/2017");


        $pic2 = new Instapic();
        $pic2->setAuthor("bobthesponge");
        $pic2->setDescription('a real and strange photo');
        $pic2->setUrl("insta2.jpg");
        $pic2->setCreatedAt("06/06/2013");

        $pics = array($pic1, $pic2);
        
        return $pics;

    }

    /**
     * retrieve all pics og an instagram compte
     *
     * @return array
     */
    public function retrievePhotosfromInstagram()
    {
        $instaResults= file_get_contents('https://www.instagram.com/'.$this->instaCompte.'/media/');
        $instaResult = json_decode($instaResults, true);

        $pics = array();

        foreach ($instaResult['items'] as $element) {

                $url          = $element['images']['standard_resolution']['url'];
                $author       = $element['caption']['from']['full_name'];
                $description  = $element['caption']['text'];
                $created_at   = (int)$element['created_time'];

                $pic = new Instapic();
                $pic->setAuthor($author);
                $pic->setDescription($description);
                $pic->setUrl($url);
                $pic->setCreatedAt($created_at);

                $pics[] = $pic;

        }

        return $pics;

    }

    /**
     * update the default instacompte
     *
     * @param $string
     */
    public function setInstaCompte($string)
    {
        $this->instaCompte = $string;
    }


    /**
     * get the flickerfeed
     * return an array of array og photos
     *
     * @return array
     */
    public function getFlickerFeed()
    {
        $flickerResults = simplexml_load_file($this->flickerUrl);

        $photos = array();

        foreach($flickerResults->entry as $element)
        {

            $photo['author']      = $element->author->name->__toString();
            $photo['url']         = $element->link[1]['href']->__toString();
            $photo['description'] = null;
            $photo['created_at']  = $element->published->__toString();

            $photos[] = $photo;

        }

        return $photos;

    }

    /**
     * create pics from a flicker feed;
     *
     * @return array
     */
    public function retrievePhotosFromFlicker()
    {
        $photos = $this->getFlickerFeed();

        foreach($photos as $photo) {
            $pic = new Instapic();
            $pic->setAuthor($photo['author']);
            $pic->setDescription($photo['description']);
            $pic->setUrl($photo['url']);
            $pic->setCreatedAt($photo['created_at']);

            $pics[] = $pic;
        }

        return $pics;

    }


}