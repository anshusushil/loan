<?php

class page_index extends Page {

    public $title='Dashboard';

    function initMainPage() {
        //throw new \Exception($this->app->auth->model->id, 1);
        
        $g = $this->add('Grid');
        $g ->setModel($this->app->auth->model->ref('LoanAgreement'),['contact','amount','next_repayment_date','repaid']);
        $g ->addColumn('button','repay');
        if($_GET['repay']){
            return $this->js()
                ->univ()
                ->dialogURL('Repay',$this->app->url('./repay',['loan_agreement_id'=>$_GET['repay']]))
                ->execute();
        }
    }
    function page_repay(){
        $m_agreement = $this->app->auth->model->ref('LoanAgreement')
            ->load($this->app->stickyGET('loan_agreement_id'))
            ;
        $m_repay = $m_agreement ->ref('Repayment');


        $f = $this->add('Form');
        $f->setModel($m_repay);
        $f->getElement('amount')->set($m_agreement['amount']-$m_agreement['repaid']);
        $f->onSubmit(function($f){
            $f->save();
            return $f->js()->univ()->successMessage('Repayment saved')->closeDialog();
        });

    }
}
