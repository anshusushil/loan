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
        $auth->setModel('User','name','password');
        $auth->check();
        $this->api->menu->addMenuItem('/', 'Home');
        $this->api->menu->addMenuItem('event','Event');
        $this->api->menu->addMenuItem('user','Sushil');
    }
    
}



        // For improved compatibility with Older Toolkit. See Documentation.
        // $this->add('Controller_Compat42')
        //     ->useOldTemplateTags()
        //     ->useOldStyle()
        //     ->useSMLite();
