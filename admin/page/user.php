<?php


class page_user extends Page {

    public $title='Dashboard';

    function init() {
        parent::init();
       

		//$this->add('CRUD')->setModel('User');
		//$this->add('CRUD')->setModel('Contact');
		//$this->add('CRUD')->setModel('Repayment');
		$this->add('CRUD')->setModel('LoanAgreemant');

    }

}
