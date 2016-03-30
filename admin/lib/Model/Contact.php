<?php
class Model_Contact extends SQL_Model {
    public $table = 'contact';

    function init(){
        parent::init();

        $this->addField('email');
        $this->addField('first_name');
        $this->addField('last_name');

        $this->addExpression('name')->set('concat(first_name," ",last_name)');

        $this->hasOne('User');

        $this->add('dynamic_model/Controller_AutoCreator');
    }


}