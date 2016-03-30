<?php

class page_loan extends Page {

    public $title='New Loan';

    public $m_loan_agreement = null;


    function init() {
        parent::init();

        $this->app->stickyGET('contact_id');

    }

    function page_index() {
        $this->app->redirect('./1');
    }

    function page_1() {
        $this->add('View_Info')->set('There are several type of loans, select which type of loan you\'d like to proceed with');

        $bs = $this->add('ButtonSet');

        $bs->add('Button')->set('Pay at One Time')->link('../2',['type'=>'Single']);
        $bs->add('Button')->set('Pay Regular Multiple Time')->link('../2',['type'=>'Multiple']);
    }

    function page_2() {

        $m = $this->app->auth->model->ref('LoanAgreement');
        $m->addCondition('type',$this->app->stickyGET('type'));

        $m->addCondition('contact_id',$_GET['contact_id']);

        if($_GET['type'] == 'Single'){
            $m->getElement('next_repayment_date')->caption('Repayment Date');
            $m->getElement('next_repayment_amount')->editable(false);
            $m->getElement('next_repayment_repeats')->editable(false);
        }

        $f = $this->add('Form');
        $f->setModel($m);

        $f->addSubmit('Next');
        $f->onSubmit(function($f){
            $f->save();
            return $f->js()->redirect('../3',['loan_agreement_id'=>$f->model->id]);
        });

    }
    function page_3() {
        $m = $this->app->auth->model->ref('LoanAgreement');
        $m->load($this->app->stickyGET('loan_agreement_id'));

        if($m['is_accepted']){
            $this->add('View_Error')->set('Loan already accepted');
            return;
        }

        $this->add('View_Info')->set('Loan accepted first');


        $bs = $this->add('ButtonSet');

        $bs->add('Button')
            ->set('Already Accepted')
            ->onClick(function($b)use($m){
                $m->accept();
                return $this->js()->redirect('/');
            });

        $bs->add('Button')->set('Contact Email');

    }
}
