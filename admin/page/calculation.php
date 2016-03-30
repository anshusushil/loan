<?php

class page_calculation extends Page {

   
    function init() {
        parent::init();

        $type=$this->app->stickyGET('type');
        $this->app->stickyGET('contact_id');

        $aggr=$this->app->auth->model->ref('LoanAggrement');
        $aggr->addCondition('type',$type);
        $aggr->addCondition('contact_id',$_GET['contact_id']);
         $aggr->tryLoadAny();       

        if($type=='one_time'){
            $aggr->getElement('next_date')->editable(false);
            $aggr->getElement('next_amount')->editable(false);
            $aggr->getElement('is_accepted')->editable(false);

        }
        
        $form=$this->add('Form');
        $form->setModel($aggr);

        $form->onSubmit(function($f){
            $f->save();
            return $f->js()->univ()->redirect('./accept',['loan_agreement_id'=>$f->model->id]);
        });

    }

    function page_accept(){
        $id=$this->app->stickyGET('loan_agreement_id');
        
        $m=$this->app->auth->model->ref('LoanAggrement')->load($_GET['loan_agreement_id']);

        if($m['is_accepted']==true){
            $this->add('View_Info')->set('Allrady Accepted Loan Amount');
        }

        $this->add('Button')->set('Accept Amount')->onClick(function($b)use($m){
            $m->Accept();

            $b->js()->univ()->redirect('/');
        }); 


    }
}









