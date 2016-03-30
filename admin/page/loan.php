<?php


class page_loan extends Page {

    public $title='Loan Aggreement';

    function init() {
        parent::init();
       
        // $btn1 = $this->add('Button')->set('one_time')->link('calculation',['type'=>'one_time']);
        // $btn2 = $this->add('Button')->set('multiple_time')->link('calculation',['type'=>'multiple_time']);
        $contact_id=$this->app->stickyGET('contact_id');
        $button1 = $this->add('Button')->set('Settle')->link('calculation',['type'=>'one_time']);
        $button2 = $this->add('Button')->set('Installment')->link('calculation',['type'=>'multiple_time','contact_id'=>$contact_id]);
    }

}
