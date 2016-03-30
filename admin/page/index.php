<?php

/**
 * Created by Konstantin Kolodnitsky
 * Date: 25.11.13
 * Time: 14:57
 */
class page_index extends Page {

    public $title='Dashboard';

    function init() {
        parent::init();
        $this->add('View_Info')->set('Loan Application');

        $id=$this->app->stickyGET('loan_agreement_id');
    	throw new Exception($id, 1);
    	
    	$this->add('Model_LoanAggrement')->load($_GET['loan_agreement_id']);
       

    }

}
