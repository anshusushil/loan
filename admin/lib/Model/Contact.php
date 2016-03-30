<?php

Class Model_Contact extends SQL_Model{
	public $table = "contact";
	function init(){
		parent::init();
		$this->hasone('User','user_id');
		$this->addField('Address');
		$this->addField('dob');

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}