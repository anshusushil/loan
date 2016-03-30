<?php


class page_contact extends Page {

    public $title='Dashboard';

    function init() {
        parent::init();
       

		// 
		$c=$this->add('CRUD');
        $c->setModel($this->app->auth->model->ref('Contact'));
        $c->grid->addColumn('link','loan',['descr'=>'Loan Aggrement','id_field'=>'contact_id','page'=>'loan']);

    }

}
