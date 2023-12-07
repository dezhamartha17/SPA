<?php
namespace App\Services;
use App\Services\Service;

class Imgbb extends Service {
    public $baseUri, $key;
    public function __construct(){
        $this->baseUri = 'https://api.imgbb.com';
        $this->key = 'b7bbdb9567f327ec531c63314e697f9b';
    }

    public function postImage($params){
        return $this->requestService('POST', "/1/upload?key=$this->key", $params);
    }
}