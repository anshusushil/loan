<?php
class Model_Repayment extends SQL_Model {
    public $table = 'repayment';

    function init(){
        parent::init();

        $this->hasOne('LoanAgreement');

        $this->addField('amount')->type('money')->defaultValue(500);
        $this->addField('repayment_date')->type('date')->defaultValue(date('Y-m-d'));


        $this->add('dynamic_model/Controller_AutoCreator');
    }


}
