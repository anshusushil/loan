<?php

Class Model_LoanAgreemant extends SQL_Model{
	public $table = "loanagreemant";
	function init(){
		parent::init();

		$this->hasone('User','user_id');
		$this->hasone('Contact','contact_id');

		$this->addfield('type')->enum(['one_time','multiple_time']);
		$this->addfield('loan');
		$this->addfield('is_accepted')->type('boolean');
		$this->addfield('loan_date')->type('date')->defaultValue(date('Y-m-d'));
		$this->addfield('next_date')->type('date')->defaultValue(date('Y-m-d',strtotime('+1 month')));
		$this->addfield('next_amount');

		$this->hasmany('Repayment');


		$this->add('dynamic_model/Controller_AutoCreator');
	}
}