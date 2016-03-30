<?php

Class Model_Repayment extends SQL_Model{
	public $table = "repayment";
	function init(){
		parent::init();

		$this->hasone('LoanAgreemant');

		$this->addfield('payment');
		$this->addfield('date')->type('date')->defaultValue(date('Y-m-d'));

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}