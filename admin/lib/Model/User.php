<?php

Class Model_User extends SQL_Model{
	public $table = "user";
	function init(){
		parent::init();

		$this->addField('email');
		$this->addField('name');
		$this->addField('password');

		$this->hasmany('Contact');
		$this->hasmany('LoanAgreemant');

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}