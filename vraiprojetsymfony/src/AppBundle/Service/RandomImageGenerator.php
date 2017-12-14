<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/12/17
 * Time: 11:44
 */
namespace AppBundle\Service;
class RandomImageGenerator
{
    private $keywords;
    public function __construct($keywords){
        $this ->keywords = $keywords;
    }
    public function getRandomImageURL(){
        return "http://www.bg-services-83.fr/userfiles/962/BG_SERVICES_fond.jpg".$this->keywords[array_rand($this->keywords)];
    }
}

// faire fond d'écran (90% fini) et logout