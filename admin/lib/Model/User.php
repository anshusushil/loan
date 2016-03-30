<?php
class Model_User extends SQL_Model {
    public $table = 'user';
    public $title_field = 'email';

    function init(){
        parent::init();

        $this->addField('email');
        $this->addField('password')->type('password');

        $this->hasMany('Contact');
        $this->hasMany('LoanAgreement');

        $this->add('dynamic_model/Controller_AutoCreator');
    }


}
