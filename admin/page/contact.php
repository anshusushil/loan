<?php

class page_contact extends Page {

    public $title='Contacts';

    function init() {
        parent::init();
        $cr = $this->add('CRUD');
        $cr->setModel($this->app->auth->model->ref('Contact'));
        $cr->grid->addColumn('link','loan_money',['descr'=>'Loan Money','id_field'=>'contact_id','page'=>'loan']);

    }