<?php

class Admin extends App_Admin {

    function init() {
        parent::init();

        $this->api->pathfinder
            ->addLocation(array(
                'addons' => array('addons', 'vendor'),
            ))
            ->setBasePath($this->pathfinder->base_location->getPath() . '/..')
        ;

        $this->app->dbConnect();
        $auth=$this->add('Auth');
        $auth->setModel('User','email','password');
        $auth->check();
        $this->api->menu->addMenuItem('/', 'Home');
        $this->api->menu->addMenuItem('event','Event');
        $this->api->menu->addMenuItem('loan','Sushil');
    }
    
}


