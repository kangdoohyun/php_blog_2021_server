<?php 
namespace App\Controller;

use App\Container\Container;
use App\Controller\Controller;

class UsrHomeController extends Controller{

    use Container;

    public function actionShowAboutMe() 
    {
        require_once $this->getViewPath("usr/home/aboutMe");
    }

}