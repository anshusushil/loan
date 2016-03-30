<?php
class Model_LoanAgreement extends SQL_Model {
    public $table = 'loan_agreement';

    function init(){
        parent::init();

        $this->hasOne('User');
        $this->hasOne('Contact');

        $this->addField('type')->enum(['Single','Multiple']);

        $this->addField('amount')->type('money')->defaultValue(500);
        $this->addField('loan_date')->type('date')->defaultValue(date('Y-m-d'));

        $this->addField('is_accepted')->type('boolean')->editable(false);

        $this->addExpression('repaid')->set(function($m){
            return $m->refSQL('Repayment')->sum('amount');
        });

        $this->addField('next_repayment_date')->type('date')->defaultValue(date('Y-m-d',strtotime('+1 month')));
        $this->addField('next_repayment_amount')->type('money');
        $this->addField('next_repayment_repeats')->enum(['monthly','weekly']);

        $this->hasMany('Repayment');

        $this->add('dynamic_model/Controller_AutoCreator');
    }

    function accept(){
        $this['is_accepted'] = true;
        $this->save();
    }


}
