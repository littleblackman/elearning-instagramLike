<?php

class Manager
{

    private $instaCompte = "littlebl6ckm6n";

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


    public function retriveInfofromInstagram()
    {
        $instaResults= file_get_contents('https://www.instagram.com/'.$this->compteInstagram.'/media/');
        $instaResult = json_decode($instaResults, true);

        echo '<pre>'; print_($instaResult);

    }


}